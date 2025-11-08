<template>
    <Head title="Админ панель" />
    
    <div class="admin-layout">
        <div v-if="sidebarOpen" class="sidebar-overlay" @click="closeSidebar"></div>
        
        <aside class="sidebar" :class="{ 'sidebar-open': sidebarOpen }">
            <div class="sidebar-header">
                <h2>Админка</h2>
            </div>
            <nav class="sidebar-nav">
                <a href="/admin" class="nav-item" :class="{ active: $page.url === '/admin' }" @click="closeSidebar">
                    Главная
                </a>
                <a href="/admin/menu-items" class="nav-item" :class="{ active: $page.url.startsWith('/admin/menu-items') }" @click="closeSidebar">
                    Пункты меню
                </a>
                <a href="/admin/advantages" class="nav-item" :class="{ active: $page.url.startsWith('/admin/advantages') }" @click="closeSidebar">
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
                <button class="burger-menu" @click="toggleSidebar">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M3 12H21M3 6H21M3 18H21" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                    </svg>
                </button>
                <h1>Панель управления</h1>
            </div>
            <div class="dashboard-grid">
                <div class="dashboard-card">
                    <h3>Быстрые действия</h3>
                    <div class="card-actions">
                        <a href="/admin/menu-items" class="action-link">
                            Управление меню →
                        </a>
                        <a href="/admin/advantages" class="action-link">
                            Управление преимуществами →
                        </a>
                    </div>
                </div>
                <div class="dashboard-card">
                    <h3>Информация</h3>
                    <p>Добро пожаловать в панель управления сайтом.</p>
                    <p>Используйте меню слева для навигации.</p>
                </div>
            </div>
        </main>
    </div>
</template>

<script setup>
import { Head, router } from '@inertiajs/vue3';
import { ref } from 'vue';

const sidebarOpen = ref(false);

const toggleSidebar = () => {
    sidebarOpen.value = !sidebarOpen.value;
};

const closeSidebar = () => {
    sidebarOpen.value = false;
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
    position: relative;
}

.sidebar-overlay {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(0, 0, 0, 0.5);
    z-index: 998;
}

.sidebar {
    width: 250px;
    background: $color-text;
    color: $color-white;
    display: flex;
    flex-direction: column;
    transition: transform 0.3s ease;
    z-index: 999;
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
    align-items: center;
    gap: 15px;
    margin-bottom: 30px;

    h1 {
        margin: 0;
        color: $color-text;
        font-size: 28px;
    }
}

.burger-menu {
    display: none;
    background: none;
    border: none;
    cursor: pointer;
    padding: 8px;
    color: $color-text;
    align-items: center;
    justify-content: center;
    transition: opacity 0.3s;

    &:hover {
        opacity: 0.7;
    }

    svg {
        display: block;
    }
}

.dashboard-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 20px;
}

.dashboard-card {
    background: white;
    padding: 25px;
    border-radius: 10px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}

.dashboard-card h3 {
    margin: 0 0 15px 0;
    color: #272B37;
    font-size: 20px;
}

.dashboard-card p {
    color: #666;
    line-height: 1.6;
    margin: 10px 0;
}

.card-actions {
    display: flex;
    flex-direction: column;
    gap: 10px;
}

.action-link {
    display: inline-block;
    padding: 10px 15px;
    background: #17BE79;
    color: white;
    text-decoration: none;
    border-radius: 5px;
    transition: background 0.3s;
}

.action-link:hover {
    background: #15a86a;
}

@media (max-width: 768px) {
    .sidebar-overlay {
        display: block;
    }

    .sidebar {
        position: fixed;
        top: 0;
        left: 0;
        bottom: 0;
        transform: translateX(-100%);
        height: 100vh;
        overflow-y: auto;

        &.sidebar-open {
            transform: translateX(0);
        }
    }

    .admin-content {
        width: 100%;
    }

    .burger-menu {
        display: flex;
    }

    .content-header {
        h1 {
            font-size: 24px;
        }
    }
}

@media (max-width: 480px) {
    .content-header {
        h1 {
            font-size: 20px;
        }
    }
}
</style>


