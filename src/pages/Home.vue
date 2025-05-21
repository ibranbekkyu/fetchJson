<!-- <script setup>
import { RouterLink } from 'vue-router';
</script>
<template>
    <div class="center-container">
        <h1>Welcome to Vue Post CRUD tutorial.</h1>
        <RouterLink :to="`/posts`" class="btn btn-green">Go To Posts</RouterLink>
    </div>
</template> -->

<script setup>
import { RouterLink, useRouter } from 'vue-router';

const router = useRouter();

function handleLogout() {
  localStorage.removeItem('user');
  router.push('/'); // pastikan route '/login' mengarah ke PostsLogin.vue
}
</script>

<template>
  <div class="home-container">
    <div class="content">
      <h1 class="title">Welcome to Vue Post CRUD Tutorial</h1>
      <p class="subtitle">Manage your posts efficiently and easily.</p>
      <div class="actions">
        <RouterLink :to="`/posts`" class="btn btn-green">Go To Posts</RouterLink>
        <button class="btn btn-red" @click="handleLogout">Logout</button>
      </div>
    </div>
  </div>
</template>

<style scoped>
.home-container {
  display: flex;
  justify-content: center;
  align-items: center;
  min-height: 100vh;
  background: #0a0a0a;
  color: #fff;
  text-align: center;
  padding: 2rem;
  position: relative;
  overflow: hidden;
}

.home-container::before {
  content: '';
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background: linear-gradient(45deg, #ff00ff22, #00ffff22);
  z-index: 1;
}

.content {
  max-width: 500px;
  width: 100%;
  background: rgba(20, 20, 20, 0.4);
  border-radius: 1rem;
  padding: 2.5rem 2rem;
  backdrop-filter: blur(10px);
  position: relative;
  z-index: 2;
  transition: transform 0.3s ease;
}

.content::before {
  content: '';
  position: absolute;
  top: -2px;
  left: -2px;
  right: -2px;
  bottom: -2px;
  background: linear-gradient(45deg, 
    #ff0000, #ff7300, #fffb00, #48ff00, 
    #00ffd5, #002bff, #7a00ff, #ff00c8, #ff0000);
  border-radius: 1.2rem;
  z-index: -1;
  animation: glowing 20s linear infinite;
  background-size: 400%;
}

.content::after {
  content: '';
  position: absolute;
  inset: 0;
  border-radius: 1rem;
  background: rgba(20, 20, 20, 0.4);
  backdrop-filter: blur(10px);
  z-index: -1;
}

@keyframes glowing {
  0% { background-position: 0 0; }
  50% { background-position: 400% 0; }
  100% { background-position: 0 0; }
}

.content:hover {
  transform: translateY(-5px);
}

.title {
  font-size: 2.5rem;
  font-weight: bold;
  margin-bottom: 1rem;
  color: #fff;
  text-shadow: 0 0 10px rgba(0, 255, 255, 0.5),
               0 0 20px rgba(255, 0, 255, 0.3);
}

.subtitle {
  font-size: 1.2rem;
  margin-bottom: 2rem;
  color: #ccc;
  text-shadow: 0 0 5px rgba(0, 255, 255, 0.3);
}

.actions {
  display: flex;
  justify-content: center;
  gap: 1rem;
}

.btn {
  padding: 0.75rem 1.5rem;
  border-radius: 0.5rem;
  font-size: 1rem;
  font-weight: 600;
  text-transform: uppercase;
  transition: all 0.3s ease;
  display: inline-block;
  text-decoration: none;
  border: none;
  cursor: pointer;
  position: relative;
  overflow: hidden;
}

.btn::before {
  content: '';
  position: absolute;
  top: 0;
  left: -100%;
  width: 100%;
  height: 100%;
  background: linear-gradient(
    90deg,
    transparent,
    rgba(255, 255, 255, 0.2),
    transparent
  );
  transition: 0.5s;
}

.btn:hover::before {
  left: 100%;
}

.btn-green {
  background-color: #00ff00;
  color: #000;
  box-shadow: 0 0 10px rgba(0, 255, 0, 0.5),
              0 0 20px rgba(0, 255, 0, 0.3);
}

.btn-green:hover {
  background-color: #00ff00;
  transform: scale(1.05);
  box-shadow: 0 0 20px rgba(0, 255, 0, 0.7),
              0 0 40px rgba(0, 255, 0, 0.5);
}

.btn-red {
  background-color: #ff0000;
  color: #fff;
  box-shadow: 0 0 10px rgba(255, 0, 0, 0.5),
              0 0 20px rgba(255, 0, 0, 0.3);
}

.btn-red:hover {
  background-color: #ff0000;
  transform: scale(1.05);
  box-shadow: 0 0 20px rgba(255, 0, 0, 0.7),
              0 0 40px rgba(255, 0, 0, 0.5);
}
</style>