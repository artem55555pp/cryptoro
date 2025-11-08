<template>
    <Head title="Управление преимуществами" />
    
    <div class="admin-layout">
        <aside class="sidebar">
            <div class="sidebar-header">
                <h2>Админка</h2>
            </div>
            <nav class="sidebar-nav">
                <a href="/admin" class="nav-item" :class="{ active: $page.url === '/admin' }">
                    Главная
                </a>
                <a href="/admin/menu-items" class="nav-item" :class="{ active: $page.url.startsWith('/admin/menu-items') }">
                    Пункты меню
                </a>
                <a href="/admin/advantages" class="nav-item" :class="{ active: $page.url.startsWith('/admin/advantages') }">
                    Преимущества
                </a>
            </nav>
            <div class="sidebar-footer">
                <form @submit.prevent="logout">
                    <button type="submit" class="btn-logout">Выйти</button>
                </form>
            </div>
        </aside>

        <main class="admin-content">
            <div class="content-header">
                <h1>Управление преимуществами</h1>
                <button @click="showAddForm = !showAddForm" class="btn-primary">
                    {{ showAddForm ? 'Отмена' : '+ Добавить преимущество' }}
                </button>
            </div>

            <div v-if="showAddForm" class="form-card">
                <h3>Добавить новое преимущество</h3>
                <form @submit.prevent="addItem">
                    <div class="form-row">
                        <div class="form-group">
                            <label>Название</label>
                            <input v-model="newItem.title" type="text" required class="form-input" />
                        </div>
                        <div class="form-group">
                            <label>Описание</label>
                            <textarea v-model="newItem.description" class="form-input" rows="3"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Иконка (путь к файлу)</label>
                            <input v-model="newItem.icon" type="text" class="form-input" placeholder="/assets/block.svg" />
                        </div>
                        <div class="form-group">
                            <label>Порядок</label>
                            <input v-model.number="newItem.order" type="number" class="form-input" />
                        </div>
                        <div class="form-group">
                            <label class="checkbox-label">
                                <input v-model="newItem.is_active" type="checkbox" />
                                Активен
                            </label>
                        </div>
                    </div>
                    <button type="submit" class="btn-primary">Добавить</button>
                </form>
            </div>

            <div v-if="flash?.success" class="alert alert-success">
                {{ flash.success }}
            </div>

            <div class="table-card">
                <table class="data-table">
                    <thead>
                        <tr>
                            <th style="width: 40px;"></th>
                            <th>ID</th>
                            <th>Название</th>
                            <th>Описание</th>
                            <th>Иконка</th>
                            <th>Порядок</th>
                            <th>Статус</th>
                            <th>Действия</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr 
                            v-for="(item, index) in sortedAdvantages" 
                            :key="item.id"
                            :draggable="true"
                            @dragstart="handleDragStart($event, index)"
                            @dragover.prevent="handleDragOver($event, index)"
                            @drop="handleDrop($event, index)"
                            @dragend="handleDragEnd"
                            :class="{ 'dragging': draggedIndex === index, 'drag-over': dragOverIndex === index }"
                            class="draggable-row"
                        >
                            <td class="drag-handle">
                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M2 4H14M2 8H14M2 12H14" stroke="#666" stroke-width="2" stroke-linecap="round"/>
                                </svg>
                            </td>
                            <td>{{ item.id }}</td>
                            <td>
                                <input
                                    v-if="editingId === item.id"
                                    v-model="editForm.title"
                                    type="text"
                                    class="form-input-inline"
                                />
                                <span v-else>{{ item.title }}</span>
                            </td>
                            <td>
                                <textarea
                                    v-if="editingId === item.id"
                                    v-model="editForm.description"
                                    class="form-input-inline"
                                    rows="2"
                                ></textarea>
                                <span v-else>{{ item.description || '-' }}</span>
                            </td>
                            <td>
                                <input
                                    v-if="editingId === item.id"
                                    v-model="editForm.icon"
                                    type="text"
                                    class="form-input-inline"
                                />
                                <span v-else>{{ item.icon || '-' }}</span>
                            </td>
                            <td>
                                <input
                                    v-if="editingId === item.id"
                                    v-model.number="editForm.order"
                                    type="number"
                                    class="form-input-inline"
                                />
                                <span v-else>{{ item.order }}</span>
                            </td>
                            <td>
                                <label v-if="editingId === item.id" class="checkbox-label">
                                    <input v-model="editForm.is_active" type="checkbox" />
                                    Активен
                                </label>
                                <span v-else :class="item.is_active ? 'badge-success' : 'badge-inactive'">
                                    {{ item.is_active ? 'Активен' : 'Неактивен' }}
                                </span>
                            </td>
                            <td>
                                <div v-if="editingId === item.id" class="action-buttons">
                                    <button @click="saveEdit(item.id)" class="btn-sm btn-success">Сохранить</button>
                                    <button @click="cancelEdit" class="btn-sm btn-secondary">Отмена</button>
                                </div>
                                <div v-else class="action-buttons">
                                    <button @click="startEdit(item)" class="btn-sm btn-primary">Редактировать</button>
                                    <button @click="deleteItem(item.id)" class="btn-sm btn-danger">Удалить</button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </main>
    </div>
</template>

<script setup>
import { Head, router, usePage } from '@inertiajs/vue3';
import { ref, reactive, computed } from 'vue';

const props = defineProps({
    advantages: Array,
});

const page = usePage();
const flash = page.props.flash;

const showAddForm = ref(false);
const editingId = ref(null);
const draggedIndex = ref(null);
const dragOverIndex = ref(null);

const sortedAdvantages = computed(() => {
    return [...props.advantages].sort((a, b) => a.order - b.order);
});

const newItem = reactive({
    title: '',
    description: '',
    icon: '/assets/block.svg',
    order: 0,
    is_active: true,
});

const editForm = reactive({
    title: '',
    description: '',
    icon: '',
    order: 0,
    is_active: true,
});

const handleDragStart = (event, index) => {
    draggedIndex.value = index;
    event.dataTransfer.effectAllowed = 'move';
    event.dataTransfer.setData('text/html', event.target);
    event.target.style.opacity = '0.5';
};

const handleDragOver = (event, index) => {
    event.preventDefault();
    if (draggedIndex.value !== null && draggedIndex.value !== index) {
        dragOverIndex.value = index;
    }
};

const handleDrop = (event, dropIndex) => {
    event.preventDefault();
    
    if (draggedIndex.value === null || draggedIndex.value === dropIndex) {
        dragOverIndex.value = null;
        return;
    }

    const items = [...sortedAdvantages.value];
    const draggedItem = items[draggedIndex.value];
    
    items.splice(draggedIndex.value, 1);
    items.splice(dropIndex, 0, draggedItem);
    
    const updatedOrders = items.map((item, index) => ({
        id: item.id,
        order: index + 1,
    }));

    router.post('/admin/advantages/reorder', { items: updatedOrders }, {
        preserveScroll: true,
        onSuccess: () => {
            draggedIndex.value = null;
            dragOverIndex.value = null;
        },
    });
};

const handleDragEnd = (event) => {
    event.target.style.opacity = '';
    draggedIndex.value = null;
    dragOverIndex.value = null;
};

const addItem = () => {
    router.post('/admin/advantages', newItem, {
        onSuccess: () => {
            showAddForm.value = false;
            Object.assign(newItem, {
                title: '',
                description: '',
                icon: '/assets/block.svg',
                order: 0,
                is_active: true,
            });
        },
    });
};

const startEdit = (item) => {
    editingId.value = item.id;
    Object.assign(editForm, {
        title: item.title,
        description: item.description || '',
        icon: item.icon || '/assets/block.svg',
        order: item.order,
        is_active: item.is_active,
    });
};

const saveEdit = (id) => {
    router.put(`/admin/advantages/${id}`, editForm, {
        onSuccess: () => {
            editingId.value = null;
        },
    });
};

const cancelEdit = () => {
    editingId.value = null;
};

const deleteItem = (id) => {
    if (confirm('Вы уверены, что хотите удалить это преимущество?')) {
        router.delete(`/admin/advantages/${id}`);
    }
};

const logout = () => {
    router.post('/admin/logout');
};
</script>

<style scoped lang="scss">
$color-primary: #17BE79;
$color-text: #272B37;
$color-bg: #f5f5f5;
$color-white: #fff;
$color-danger: #f53003;

.admin-layout {
    display: flex;
    min-height: 100vh;
    background: $color-bg;
}

.sidebar {
    width: 250px;
    background: $color-text;
    color: $color-white;
    display: flex;
    flex-direction: column;
}

.sidebar-header {
    padding: 20px;
    border-bottom: 1px solid rgba(255, 255, 255, 0.1);

    h2 {
        margin: 0;
        font-size: 20px;
    }
}

.sidebar-nav {
    flex: 1;
    padding: 20px 0;
}

.nav-item {
    display: block;
    padding: 12px 20px;
    color: rgba(255, 255, 255, 0.7);
    text-decoration: none;
    transition: all 0.3s;

    &:hover {
        background: rgba(255, 255, 255, 0.1);
        color: $color-white;
    }

    &.active {
        background: $color-primary;
        color: $color-white;
    }
}

.sidebar-footer {
    padding: 20px;
    border-top: 1px solid rgba(255, 255, 255, 0.1);
}

.btn-logout {
    width: 100%;
    padding: 10px;
    background: $color-danger;
    color: $color-white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 14px;
    transition: background 0.3s;

    &:hover {
        background: #d42800;
    }
}

.admin-content {
    flex: 1;
    padding: 30px;
    overflow-x: auto;
}

.content-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 30px;
    flex-wrap: wrap;
    gap: 15px;

    h1 {
        margin: 0;
        color: $color-text;
        font-size: 28px;
    }
}

.btn-primary {
    padding: 10px 20px;
    background: $color-primary;
    color: $color-white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 14px;
    transition: background 0.3s;
    white-space: nowrap;

    &:hover {
        background: #15a86a;
    }
}

.form-card {
    background: $color-white;
    padding: 25px;
    border-radius: 10px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    margin-bottom: 20px;

    h3 {
        margin: 0 0 20px 0;
        color: $color-text;
    }
}

.form-row {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 15px;
    margin-bottom: 15px;
}

.form-group {
    display: flex;
    flex-direction: column;

    label {
        margin-bottom: 5px;
        color: $color-text;
        font-weight: 500;
        font-size: 14px;
    }
}

.form-input {
    padding: 8px;
    border: 1px solid #ddd;
    border-radius: 5px;
    font-size: 14px;
    font-family: inherit;

    &:focus {
        outline: none;
        border-color: $color-primary;
    }
}

.checkbox-label {
    flex-direction: row;
    align-items: center;
    gap: 8px;
    font-weight: normal;
    cursor: pointer;

    input {
        width: auto;
        cursor: pointer;
    }
}

.table-card {
    background: $color-white;
    padding: 25px;
    border-radius: 10px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    overflow-x: auto;
}

.data-table {
    width: 100%;
    border-collapse: collapse;
    min-width: 900px;

    th {
        text-align: left;
        padding: 12px;
        background: $color-bg;
        color: $color-text;
        font-weight: 600;
        border-bottom: 2px solid #ddd;
    }

    td {
        padding: 12px;
        border-bottom: 1px solid #eee;
    }

    tr:hover {
        background: #f9f9f9;
    }
}

.draggable-row {
    cursor: move;
    transition: background-color 0.2s;

    &.dragging {
        opacity: 0.5;
    }

    &.drag-over {
        background-color: #e8f5e9;
        border-top: 2px solid $color-primary;
    }
}

.drag-handle {
    cursor: grab;
    text-align: center;
    padding: 8px !important;
    width: 40px;

    &:active {
        cursor: grabbing;
    }

    svg {
        display: block;
        margin: 0 auto;
    }
}

.form-input-inline {
    padding: 5px;
    border: 1px solid #ddd;
    border-radius: 3px;
    font-size: 14px;
    width: 100%;
    font-family: inherit;
}

.badge-success {
    padding: 4px 8px;
    background: $color-primary;
    color: $color-white;
    border-radius: 3px;
    font-size: 12px;
}

.badge-inactive {
    padding: 4px 8px;
    background: #ccc;
    color: $color-white;
    border-radius: 3px;
    font-size: 12px;
}

.action-buttons {
    display: flex;
    gap: 5px;
    flex-wrap: wrap;
}

.btn-sm {
    padding: 5px 10px;
    border: none;
    border-radius: 3px;
    cursor: pointer;
    font-size: 12px;
    transition: all 0.3s;
    white-space: nowrap;
}

.btn-success {
    background: $color-primary;
    color: $color-white;

    &:hover {
        background: #15a86a;
    }
}

.btn-secondary {
    background: #ccc;
    color: $color-white;

    &:hover {
        background: #aaa;
    }
}

.btn-danger {
    background: $color-danger;
    color: $color-white;

    &:hover {
        background: #d42800;
    }
}

.alert {
    padding: 12px;
    border-radius: 5px;
    margin-bottom: 20px;
}

.alert-success {
    background: #d4edda;
    color: #155724;
    border: 1px solid #c3e6cb;
}

@media (max-width: 768px) {
    .admin-layout {
        flex-direction: column;
    }

    .sidebar {
        width: 100%;
        order: 2;
    }

    .sidebar-header {
        padding: 15px;
    }

    .sidebar-nav {
        display: flex;
        flex-direction: row;
        overflow-x: auto;
        padding: 10px 0;
        gap: 0;

        .nav-item {
            white-space: nowrap;
            padding: 10px 15px;
        }
    }

    .sidebar-footer {
        padding: 15px;
    }

    .admin-content {
        padding: 15px;
        order: 1;
    }

    .content-header {
        flex-direction: column;
        align-items: flex-start;

        h1 {
            font-size: 24px;
        }
    }

    .form-row {
        grid-template-columns: 1fr;
    }

    .table-card {
        padding: 15px;
    }

    .data-table {
        font-size: 14px;
        min-width: 800px;

        th, td {
            padding: 8px;
        }
    }

    .action-buttons {
        flex-direction: column;
        width: 100%;

        .btn-sm {
            width: 100%;
        }
    }
}

@media (max-width: 480px) {
    .admin-content {
        padding: 10px;
    }

    .content-header h1 {
        font-size: 20px;
    }

    .form-card {
        padding: 15px;
    }

    .table-card {
        padding: 10px;
    }

    .data-table {
        font-size: 12px;
        min-width: 700px;

        th, td {
            padding: 6px;
        }
    }

    .drag-handle {
        width: 30px;
        padding: 6px !important;

        svg {
            width: 12px;
            height: 12px;
        }
    }
}
</style>
