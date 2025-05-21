<!-- <script setup>
import { onMounted, reactive } from 'vue';
import { RouterLink } from 'vue-router';
import axios from 'axios';
import Post from '@/components/Post.vue';

const state = reactive({
    posts: []
})

onMounted(async () => {
  try {
    const response = await axios.get('http://localhost/belajar-api/get-all-data.php');
    state.posts = response.data;
  } catch (error) {
    console.error('Error fetching jobs:', error);
  }
});
</script>
<template>
  <div class="center-container">
    <h1>All Post</h1> 
    <RouterLink :to="`/`" class="btn btn-blue">Go to Home</RouterLink>
    <RouterLink :to="`/posts/add`" class="btn btn-green">Add Post</RouterLink>
    <br />
    <br />
    <table id="posts">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Kelas</th>
            <th>Action</th>
        </tr>
        <Post v-for="post in state.posts" :key="post.student_id" :post="post"/>
    </table>
  </div>
</template> -->

<!-- Terbaru -->

<!-- <script setup>
import { onMounted, reactive } from "vue";
import { RouterLink } from "vue-router";
import axios from "axios";
import Post from "@/components/Post.vue";

const state = reactive({
  posts: [],
});

onMounted(async () => {
  try {
    const response = await axios.get(
      "http://localhost/belajar-api/get-all-data.php"
    );
    state.posts = response.data;
  } catch (error) {
    console.error("Error fetching jobs:", error);
  }
});
</script>
<template>
  <div class="center-container">
    <h1>All Post</h1>
    <RouterLink :to="`/`" class="btn btn-blue">Go to Home</RouterLink>
    <RouterLink :to="`/posts/add`" class="btn btn-green">Add Post</RouterLink>
    <br />
    <br />
    <table id="posts" border="1">
      <tr>
        <th>No</th>
        <th>Name</th>
        <th>Class</th>
        <th>Action</th>
      </tr>
      <Post v-for="post in state.posts" :key="post.id" :post="post" />
    </table>
  </div>
</template>

<style scoped>
.center-container {
  padding: 20px;
  color: white;
}
table {
  width: 100%;
  border-collapse: collapse;
}
th,
td,
tr {
  padding: 8px;
  text-align: left;
  color: white;
  align-items: center;
  text-align: center;
}
</style> -->

<script setup>
import { onMounted, reactive } from "vue";
import { RouterLink } from "vue-router";
import axios from "axios";
import Post from "@/components/Post.vue";

const state = reactive({
  posts: [],
});

onMounted(async () => {
  try {
    const response = await axios.get(
      "http://localhost/belajar-api/get-all-data.php"
    );
    state.posts = response.data;
  } catch (error) {
    console.error("Error fetching posts:", error);
  }
});
</script>

<template>
  <div class="posts-container">
    <div class="content">
      <h1 class="title">All Posts</h1>
      <div class="actions">
        <RouterLink :to="`/home`" class="btn btn-blue">Go to Home</RouterLink>
        <RouterLink :to="`/posts/add`" class="btn btn-green"
          >Add Post</RouterLink
        >
      </div>
      <table class="posts-table">
        <thead>
          <tr>
            <th>No</th>
            <th>Name</th>
            <th>Class</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <Post
            v-for="post in state.posts"
            :key="post.student_id"
            :post="post"
          />
        </tbody>
      </table>
    </div>
  </div>
</template>

<style scoped>
/* Container styling */
.posts-container {
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

.posts-container::before {
  content: '';
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background: linear-gradient(45deg, #ff00ff22, #00ffff22);
  z-index: 1;
}

/* Content styling */
.content {
  max-width: 900px;
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

/* Title styling */
.title {
  font-size: 2.5rem;
  font-weight: bold;
  margin-bottom: 1.5rem;
  color: #fff;
  text-shadow: 0 0 10px rgba(0, 255, 255, 0.5),
               0 0 20px rgba(255, 0, 255, 0.3);
}

/* Actions styling */
.actions {
  display: flex;
  justify-content: center;
  gap: 1rem;
  margin-bottom: 2rem;
}

.btn {
  padding: 0.75rem 1.5rem;
  border-radius: 0.5rem;
  font-size: 1rem;
  font-weight: 600;
  text-transform: uppercase;
  transition: all 0.3s ease;
  text-decoration: none;
  display: inline-block;
  position: relative;
  overflow: hidden;
  border: none;
  cursor: pointer;
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

.btn-blue {
  background-color: #0066ff;
  color: white;
  box-shadow: 0 0 10px rgba(0, 102, 255, 0.5),
              0 0 20px rgba(0, 102, 255, 0.3);
}

.btn-blue:hover {
  background-color: #0066ff;
  transform: scale(1.05);
  box-shadow: 0 0 20px rgba(0, 102, 255, 0.7),
              0 0 40px rgba(0, 102, 255, 0.5);
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

/* Table styling */
.posts-table {
  width: 100%;
  border-collapse: separate;
  border-spacing: 0;
  background: rgba(255, 255, 255, 0.05);
  border-radius: 0.5rem;
  overflow: hidden;
  box-shadow: 0 0 20px rgba(0, 255, 255, 0.1);
}

.posts-table th,
.posts-table td {
  padding: 1rem;
  text-align: center;
  color: #fff;
  border-bottom: 1px solid rgba(255, 255, 255, 0.1);
  transition: all 0.3s ease;
}

.posts-table th {
  background: rgba(0, 0, 0, 0.3);
  font-weight: bold;
  text-transform: uppercase;
  letter-spacing: 1px;
  text-shadow: 0 0 5px rgba(0, 255, 255, 0.5);
}

.posts-table tr {
  transition: all 0.3s ease;
}

.posts-table tr:hover {
  background: rgba(255, 255, 255, 0.1);
  transform: scale(1.01);
}

.posts-table tr:hover td {
  text-shadow: 0 0 5px rgba(255, 255, 255, 0.5);
}
</style>
