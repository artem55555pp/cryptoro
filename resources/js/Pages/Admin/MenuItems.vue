<template>
    <Head title="Управление меню" />
    
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
                <h1>Управление пунктами меню</h1>
                <button @click="showAddForm = !showAddForm" class="btn-primary">
                    {{ showAddForm ? 'Отмена' : '+ Добавить пункт' }}
                </button>
            </div>

            <div v-if="showAddForm" class="form-card">
                <h3>Добавить новый пункт меню</h3>
                <form @submit.prevent="addItem">
                    <div class="form-row">
                        <div class="form-group">
                            <label>Название</label>
                            <input v-model="newItem.title" type="text" required class="form-input" />
                        </div>
                        <div class="form-group">
                            <label>URL</label>
                            <input v-model="newItem.url" type="text" class="form-input" placeholder="#" />
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
                            <th>ID</th>
                            <th>Название</th>
                            <th>URL</th>
                            <th>Порядок</th>
                            <th>Статус</th>
                            <th>Действия</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="item in menuItems" :key="item.id">
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
                                <input
                                    v-if="editingId === item.id"
                                    v-model="editForm.url"
                                    type="text"
                                    class="form-input-inline"
                                />
                                <span v-else>{{ item.url || '#' }}</span>
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
import { ref, reactive } from 'vue';

const props = defineProps({
    menuItems: Array,
});

const page = usePage();
const flash = page.props.flash;

const showAddForm = ref(false);
const editingId = ref(null);

const newItem = reactive({
    title: '',
    url: '#',
    order: 0,
    is_active: true,
});

const editForm = reactive({
    title: '',
    url: '',
    order: 0,
    is_active: true,
});

const addItem = () => {
    router.post('/admin/menu-items', newItem, {
        onSuccess: () => {
            showAddForm.value = false;
            Object.assign(newItem, {
                title: '',
                url: '#',
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
        url: item.url || '#',
        order: item.order,
        is_active: item.is_active,
    });
};

const saveEdit = (id) => {
    router.put(`/admin/menu-items/${id}`, editForm, {
        onSuccess: () => {
            editingId.value = null;
        },
    });
};

const cancelEdit = () => {
    editingId.value = null;
};

const deleteItem = (id) => {
    if (confirm('Вы уверены, что хотите удалить этот пункт меню?')) {
        router.delete(`/admin/menu-items/${id}`);
    }
};

const logout = () => {
    router.post('/admin/logout');
};
</script>

<style scoped>
.admin-layout {
    display: flex;
    min-height: 100vh;
    background: #f5f5f5;
}

.sidebar {
    width: 250px;
    background: #272B37;
    color: white;
    display: flex;
    flex-direction: column;
}

.sidebar-header {
    padding: 20px;
    border-bottom: 1px solid rgba(255, 255, 255, 0.1);
}

.sidebar-header h2 {
    margin: 0;
    font-size: 20px;
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
}

.nav-item:hover {
    background: rgba(255, 255, 255, 0.1);
    color: white;
}

.nav-item.active {
    background: #17BE79;
    color: white;
}

.sidebar-footer {
    padding: 20px;
    border-top: 1px solid rgba(255, 255, 255, 0.1);
}

.btn-logout {
    width: 100%;
    padding: 10px;
    background: #f53003;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 14px;
}

.btn-logout:hover {
    background: #d42800;
}

.admin-content {
    flex: 1;
    padding: 30px;
}

.content-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 30px;
}

.content-header h1 {
    margin: 0;
    color: #272B37;
    font-size: 28px;
}

.btn-primary {
    padding: 10px 20px;
    background: #17BE79;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 14px;
}

.btn-primary:hover {
    background: #15a86a;
}

.form-card {
    background: white;
    padding: 25px;
    border-radius: 10px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    margin-bottom: 20px;
}

.form-card h3 {
    margin: 0 0 20px 0;
    color: #272B37;
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
}

.form-group label {
    margin-bottom: 5px;
    color: #272B37;
    font-weight: 500;
    font-size: 14px;
}

.form-input {
    padding: 8px;
    border: 1px solid #ddd;
    border-radius: 5px;
    font-size: 14px;
}

.form-input:focus {
    outline: none;
    border-color: #17BE79;
}

.checkbox-label {
    flex-direction: row;
    align-items: center;
    gap: 8px;
    font-weight: normal;
    cursor: pointer;
}

.checkbox-label input {
    width: auto;
    cursor: pointer;
}

.table-card {
    background: white;
    padding: 25px;
    border-radius: 10px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    overflow-x: auto;
}

.data-table {
    width: 100%;
    border-collapse: collapse;
}

.data-table th {
    text-align: left;
    padding: 12px;
    background: #f5f5f5;
    color: #272B37;
    font-weight: 600;
    border-bottom: 2px solid #ddd;
}

.data-table td {
    padding: 12px;
    border-bottom: 1px solid #eee;
}

.data-table tr:hover {
    background: #f9f9f9;
}

.form-input-inline {
    padding: 5px;
    border: 1px solid #ddd;
    border-radius: 3px;
    font-size: 14px;
    width: 100%;
}

.badge-success {
    padding: 4px 8px;
    background: #17BE79;
    color: white;
    border-radius: 3px;
    font-size: 12px;
}

.badge-inactive {
    padding: 4px 8px;
    background: #ccc;
    color: white;
    border-radius: 3px;
    font-size: 12px;
}

.action-buttons {
    display: flex;
    gap: 5px;
}

.btn-sm {
    padding: 5px 10px;
    border: none;
    border-radius: 3px;
    cursor: pointer;
    font-size: 12px;
}

.btn-success {
    background: #17BE79;
    color: white;
}

.btn-success:hover {
    background: #15a86a;
}

.btn-secondary {
    background: #ccc;
    color: white;
}

.btn-secondary:hover {
    background: #aaa;
}

.btn-danger {
    background: #f53003;
    color: white;
}

.btn-danger:hover {
    background: #d42800;
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
</style>


