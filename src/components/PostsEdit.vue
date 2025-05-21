<!-- <script setup>
import axios from 'axios';
import { onMounted, reactive } from 'vue';
import { useRoute, useRouter } from 'vue-router';

const route = useRoute();
const router = useRouter();

const postId = route.params.id;

const form = reactive({
    title: '',
    description: ''
})

onMounted( async () => {
    try {
        const response = await axios.get(`http://localhost/belajar-api/update-data.php/posts/${postId}`);
        form.title = response.data.title;
        form.description = response.data.description;
    } catch (error) {
        console.log("Error fetching post", response);
    }
})

const handleSubmit = async () => {
    const updatePost = {
        title: form.title,
        description: form.description
    }

    try {
        const response = await axios.put(`http://localhost:8080/posts/${postId}`, updatePost);
        router.push(`/posts/${response.data.id}`);
    } catch (error) {
        console.error("Error updating post", error);
    }
}

</script>
<template>
    <RouterLink :to="`/posts`" class="btn btn-green">Return to Posts</RouterLink>
    <div>
        <form @submit.prevent="handleSubmit">
            <label for="title">Title</label>
            <input 
            v-model="form.title" 
            type="text" 
            id="title" 
            name="title" 
            placeholder="Title">
            <label for="description">Description</label>
            <textarea 
            v-model="form.description" 
            id="description" 
            name="description">
            </textarea>
            <button type="submit" class="btn btn-green">Submit</button>
        </form>
    </div>
</template>

<style scoped>
.form-container {
    max-width: 400px;
    margin: 0 auto;
}

form {
    display: flex;
    flex-direction: column;
}

label {
    margin-bottom: 5px;
    font-weight: bold;
}

input, textarea, button {
    margin-bottom: 15px;
    padding: 10px;
    font-size: 1rem;
}

textarea {
    resize: vertical;
}

button {
    background-color: #da7cb5; 
    color: white; 
    border: none; 
    border-radius: 5px; 
    cursor: pointer; 
    transition: background-color 0.3s ease; 
}

button:hover {
    background-color: #da7cb5; 
}
</style> -->

<!-- Terbaru -->

<!-- <script setup>
import axios from "axios";
import { onMounted, reactive } from "vue";
import { useRoute, useRouter } from "vue-router";

const route = useRoute();
const router = useRouter();

const postId = route.params.id;

const form = reactive({
  student_no: "",
  student_name: "",
  student_class: "",
});

onMounted(async () => {
  try {
    const response = await axios.get(
      `http://localhost/belajar-api/get-all-data.php/?id=${postId}`
    );
    form.student_no = response.data.student_no;
    form.student_name = response.data.student_name;
    form.student_class = response.data.student_class;
  } catch (error) {
    console.log("Error fetching post", response);
  }
});

const handleSubmit = async () => {
  const updatePost = {
    student_id: postId,
    student_no: form.student_no,
    student_name: form.student_name,
    student_class: form.student_class,
  };

  try {
    const response = await axios.put(
      "http://localhost/belajar-api/update-data.php",
      updatePost
    );
    console.log(response);

    router.push(`/posts/${postId}}`);
  } catch (error) {
    console.error("Error updating post", error);
  }
};
</script>
<template>
  <RouterLink :to="`/posts`" class="btn btn-green">Return to Posts</RouterLink>
  <div>
    <form @submit.prevent="handleSubmit">
      <label for="no">NO</label>
      <input
        v-model="form.student_no"
        type="text"
        id="no"
        name="no"
        placeholder="NO"
      />

      <label for="name">Name</label>
      <input
        v-model="form.student_name"
        type="text"
        id="name"
        name="name"
        placeholder="Name"
      />

      <label for="class">Class</label>
      <input
        v-model="form.student_class"
        id="class"
        name="class"
        placeholder="Class"
      />
      <button type="submit" class="btn btn-green">Submit</button>
    </form>
  </div>
</template> -->

<script setup>
import axios from "axios";
import { onMounted, reactive } from "vue";
import { useRoute, useRouter } from "vue-router";

const route = useRoute();
const router = useRouter();

const postId = route.params.id;

const form = reactive({
  student_no: "",
  student_name: "",
  student_class: "",
});

onMounted(async () => {
  try {
    const response = await axios.get(
      `http://localhost/belajar-api/get-all-data.php/?id=${postId}`
    );
    form.student_no = response.data.student_no;
    form.student_name = response.data.student_name;
    form.student_class = response.data.student_class;
  } catch (error) {
    console.log("Error fetching post", error);
  }
});

const handleSubmit = async () => {
  const updatePost = {
    student_id: postId,
    student_no: form.student_no,
    student_name: form.student_name,
    student_class: form.student_class,
  };

  try {
    const response = await axios.put(
      "http://localhost/belajar-api/update-data.php",
      updatePost
    );
    console.log(response);

    router.push(`/posts/${postId}`);
  } catch (error) {
    console.error("Error updating post", error);
  }
};
</script>

<template>
  <div class="edit-post-container">
    <div class="content">
      <h1 class="title">Edit Post</h1>
      <form @submit.prevent="handleSubmit" class="form">
        <div class="form-group">
          <label for="no">Student No</label>
          <input
            v-model="form.student_no"
            type="text"
            id="no"
            name="no"
            placeholder="Enter Student No"
            class="input"
          />
        </div>

        <div class="form-group">
          <label for="name">Student Name</label>
          <input
            v-model="form.student_name"
            type="text"
            id="name"
            name="name"
            placeholder="Enter Student Name"
            class="input"
          />
        </div>

        <div class="form-group">
          <label for="class">Student Class</label>
          <input
            v-model="form.student_class"
            id="class"
            name="class"
            placeholder="Enter Student Class"
            class="input"
          />
        </div>

        <button type="submit" class="btn btn-green">Submit</button>
      </form>
      <RouterLink :to="`/posts`" class="btn btn-gray">Return to Posts</RouterLink>
    </div>
  </div>
</template>

<style scoped>
/* Container styling */
.edit-post-container {
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

.edit-post-container::before {
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

/* Form styling */
.form {
  display: flex;
  flex-direction: column;
  gap: 1.5rem;
  margin-bottom: 2rem;
}

.form-group {
  text-align: left;
  position: relative;
}

label {
  font-size: 1rem;
  font-weight: 600;
  margin-bottom: 0.5rem;
  display: block;
  color: #00ff00;
  text-shadow: 0 0 5px rgba(0, 255, 0, 0.5);
}

.input {
  width: 100%;
  padding: 0.75rem;
  border-radius: 0.5rem;
  border: 1px solid rgba(255, 255, 255, 0.1);
  font-size: 1rem;
  background: rgba(0, 0, 0, 0.2);
  color: #fff;
  transition: all 0.3s ease;
}

.input:focus {
  outline: none;
  border-color: #00ff00;
  box-shadow: 0 0 10px rgba(0, 255, 0, 0.3),
              0 0 20px rgba(0, 255, 0, 0.2);
  background: rgba(0, 0, 0, 0.3);
}

.input::placeholder {
  color: rgba(255, 255, 255, 0.5);
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
  animation: greenGlow 2s ease-in-out infinite;
}

.btn-green:hover {
  background-color: #00ff00;
  transform: scale(1.05);
  box-shadow: 0 0 20px rgba(0, 255, 0, 0.7),
              0 0 40px rgba(0, 255, 0, 0.5);
  animation: greenGlow 0.5s ease-in-out infinite;
}

@keyframes greenGlow {
  0% { box-shadow: 0 0 10px rgba(0, 255, 0, 0.5), 0 0 20px rgba(0, 255, 0, 0.3); }
  50% { box-shadow: 0 0 20px rgba(0, 255, 0, 0.7), 0 0 40px rgba(0, 255, 0, 0.5); }
  100% { box-shadow: 0 0 10px rgba(0, 255, 0, 0.5), 0 0 20px rgba(0, 255, 0, 0.3); }
}

.btn-gray {
  background-color: #666;
  color: white;
  box-shadow: 0 0 10px rgba(102, 102, 102, 0.5),
              0 0 20px rgba(102, 102, 102, 0.3);
  animation: grayGlow 2s ease-in-out infinite;
}

.btn-gray:hover {
  background-color: #666;
  transform: scale(1.05);
  box-shadow: 0 0 20px rgba(102, 102, 102, 0.7),
              0 0 40px rgba(102, 102, 102, 0.5);
  animation: grayGlow 0.5s ease-in-out infinite;
}

@keyframes grayGlow {
  0% { box-shadow: 0 0 10px rgba(102, 102, 102, 0.5), 0 0 20px rgba(102, 102, 102, 0.3); }
  50% { box-shadow: 0 0 20px rgba(102, 102, 102, 0.7), 0 0 40px rgba(102, 102, 102, 0.5); }
  100% { box-shadow: 0 0 10px rgba(102, 102, 102, 0.5), 0 0 20px rgba(102, 102, 102, 0.3); }
}

/* RGB Animation for buttons */
.btn {
  position: relative;
  z-index: 1;
}

.btn::after {
  content: '';
  position: absolute;
  top: -2px;
  left: -2px;
  right: -2px;
  bottom: -2px;
  background: linear-gradient(45deg, 
    #ff0000, #ff7300, #fffb00, #48ff00, 
    #00ffd5, #002bff, #7a00ff, #ff00c8, #ff0000);
  z-index: -1;
  border-radius: 0.6rem;
  opacity: 0;
  transition: opacity 0.3s ease;
}

.btn:hover::after {
  opacity: 1;
  animation: rgbBorder 1.5s linear infinite;
}

@keyframes rgbBorder {
  0% { background-position: 0% 50%; }
  50% { background-position: 100% 50%; }
  100% { background-position: 0% 50%; }
}
</style>