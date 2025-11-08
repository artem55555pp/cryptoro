<template>
    <div class="login-container">
        <div class="login-box">
            <h1>Вход в админку</h1>
            <form @submit.prevent="submit">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input
                        id="email"
                        v-model="form.email"
                        type="email"
                        required
                        autofocus
                        class="form-input"
                    />
                    <div v-if="errors.email" class="error">{{ errors.email }}</div>
                </div>

                <div class="form-group">
                    <label for="password">Пароль</label>
                    <input
                        id="password"
                        v-model="form.password"
                        type="password"
                        required
                        class="form-input"
                    />
                </div>

                <div class="form-group">
                    <label class="checkbox-label">
                        <input
                            v-model="form.remember"
                            type="checkbox"
                        />
                        Запомнить меня
                    </label>
                </div>

                <button type="submit" class="btn-primary" :disabled="processing">
                    Войти
                </button>
            </form>
        </div>
    </div>
</template>

<script setup>
import { Head, useForm } from '@inertiajs/vue3';
import { ref } from 'vue';

const form = useForm({
    email: '',
    password: '',
    remember: false,
});

const processing = ref(false);

const props = defineProps({
    errors: Object,
});

const submit = () => {
    processing.value = true;
    form.post('/admin/login', {
        onFinish: () => {
            processing.value = false;
        },
    });
};
</script>

<style scoped>
.login-container {
    min-height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
    background: #f5f5f5;
    padding: 20px;
}

.login-box {
    background: white;
    padding: 40px;
    border-radius: 10px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    width: 100%;
    max-width: 400px;
}

h1 {
    margin: 0 0 30px 0;
    text-align: center;
    color: #272B37;
    font-size: 24px;
}

.form-group {
    margin-bottom: 20px;
}

label {
    display: block;
    margin-bottom: 5px;
    color: #272B37;
    font-weight: 500;
}

.form-input {
    width: 100%;
    padding: 10px;
    border: 1px solid #ddd;
    border-radius: 5px;
    font-size: 16px;
    box-sizing: border-box;
}

.form-input:focus {
    outline: none;
    border-color: #17BE79;
}

.checkbox-label {
    display: flex;
    align-items: center;
    gap: 8px;
    font-weight: normal;
    cursor: pointer;
}

.checkbox-label input {
    width: auto;
    cursor: pointer;
}

.btn-primary {
    width: 100%;
    padding: 12px;
    background: #17BE79;
    color: white;
    border: none;
    border-radius: 5px;
    font-size: 16px;
    cursor: pointer;
    font-weight: 500;
}

.btn-primary:hover:not(:disabled) {
    background: #15a86a;
}

.btn-primary:disabled {
    opacity: 0.6;
    cursor: not-allowed;
}

.error {
    color: #f53003;
    font-size: 14px;
    margin-top: 5px;
}
</style>


