<!-- <script setup>
import axios from 'axios';
import { onMounted, reactive } from 'vue';
import { useRoute } from 'vue-router';

const route = useRoute();

const postId = route.params.id;
const state = reactive({
    post: Object
})

onMounted(async () => {
    try {
        const response = await axios.get(`http://localhost:8080/posts/${postId}`);
        state.post = response.data;
    } catch (error) {
        console.log("Error while fetching: ", error);
    }
})


</script>
<template>
    <div class="center-container">
        <h1>{{ state.post.title }}</h1>
        <p>{{ state.post.description }}</p>
        <RouterLink :to="`/posts`" class="btn btn-green">Return to Posts</RouterLink>
    </div>
</template> -->

<!-- Terbaru -->

<!-- <script setup>
import axios from "axios";
import { onMounted, reactive } from "vue";
import { useRoute } from "vue-router";

const route = useRoute();

const postId = route.params.id;
const state = reactive({
  post: Object,
});

onMounted(async () => {
  try {
    const response = await axios.get(
      `http://localhost/belajar-api/get-all-data.php/?id=${postId}`
    );
    state.post = response.data;
  } catch (error) {
    console.log("Error while fetching: ", error);
  }
});
</script>
<template>
  <div class="center-container">
    <h1>{{ state.post.student_no }}</h1>
    <p>{{ state.post.student_name }}</p>
    <p>{{ state.post.student_class }}</p>
    <RouterLink :to="`/posts`" class="btn btn-green"
      >Return to Posts</RouterLink
    >
  </div>
</template> -->

<script setup>
import axios from "axios";
import { onMounted, reactive } from "vue";
import { useRoute } from "vue-router";

const route = useRoute();

const postId = route.params.id;
const state = reactive({
  post: Object,
});

onMounted(async () => {
  try {
    const response = await axios.get(
      `http://localhost/belajar-api/get-all-data.php/?id=${postId}`
    );
    state.post = response.data;
  } catch (error) {
    console.log("Error while fetching: ", error);
  }
});
</script>

<template>
  <div class="post-view-container">
    <div class="content">
      <h1 class="title">Post Details</h1>
      <div class="post-details">
        <p><strong>Student No:</strong> {{ state.post.student_no }}</p>
        <p><strong>Student Name:</strong> {{ state.post.student_name }}</p>
        <p><strong>Student Class:</strong> {{ state.post.student_class }}</p>
      </div>
      <RouterLink :to="`/posts`" class="btn btn-green">Return to Posts</RouterLink>
    </div>
  </div>
</template>

<style scoped>
/* Container styling */
.post-view-container {
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

.post-view-container::before {
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
  max-width: 600px;
  width: 100%;
  padding: 2.5rem 2rem;
  background: rgba(20, 20, 20, 0.4);
  border-radius: 1rem;
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

/* Post details styling */
.post-details {
  text-align: left;
  margin-bottom: 2rem;
  font-size: 1.125rem;
  line-height: 1.75rem;
  color: #ccc;
}

.post-details p {
  margin: 0.75rem 0;
  padding: 0.5rem;
  background: rgba(255, 255, 255, 0.05);
  border-radius: 0.5rem;
  transition: all 0.3s ease;
}

.post-details p:hover {
  background: rgba(255, 255, 255, 0.1);
  transform: translateX(5px);
}

.post-details strong {
  color: #00ff00;
  text-shadow: 0 0 5px rgba(0, 255, 0, 0.5);
  margin-right: 0.5rem;
}

/* Button styling */
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
</style>
