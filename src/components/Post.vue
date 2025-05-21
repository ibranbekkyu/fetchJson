<!-- <script setup>
import axios from "axios";
import { defineProps } from "vue";
import { RouterLink, useRouter } from "vue-router";

const router = useRouter();

const props = defineProps({
  post: Object,
});

const deletePost = async (postId) => {
  try {
    const confirm = window.confirm(
      "Are you sure you want to delete this posts?"
    );
    if (confirm) {
      await axios.delete(
        `http://localhost/belajar-api/delete-data.php/posts/${postId}`
      );
      router.push("/");
    }
  } catch (error) {
    console.error("Error deleting post: ", error);
  }
};
</script>
<template>
  <tr>
    <td>{{ post.student_id }}</td>
    <td>{{ post.student_name }}</td>
    <td>
      <RouterLink :to="`/posts/${post.student_id}`" class="btn btn-green">O</RouterLink>
      <RouterLink :to="`/posts/edit/${post.student_id}`" class="btn btn-blue"
        >/</RouterLink
      >
      <button @click="deletePost(post.student_id)" class="btn btn-red">X</button>
    </td>
  </tr>
</template> -->

<!-- Terbaru -->

<script setup>
import axios from "axios";
import { defineProps } from "vue";
import { RouterLink, useRouter } from "vue-router";

const router = useRouter();

const props = defineProps({
  post: Object,
});

const deletePost = async (deletedId) => {
  try {
    const confirm = window.confirm(
      "Are you sure you want to delete this posts?"
    );
    if (confirm) {
      const res = await axios.delete(
        `http://localhost/belajar-api/delete-data.php?student_id=${deletedId}`
      );
      console.log("Delete success:", res.data);
      router.push("/");
    }
  } catch (error) {
    console.error(
      "Error deleting post: ",
      error.response?.data || error.message
    );
  }
};
</script>
<template>
  <tr>
    <td>{{ post.student_no }}</td>
    <td>{{ post.student_name }}</td>
    <td>{{ post.student_class }}</td>
    <td class="action-buttons">
      <RouterLink :to="`/posts/${post.student_id}`" class="btn btn-view">View</RouterLink>
      <RouterLink :to="`/posts/edit/${post.student_id}`" class="btn btn-update">Update</RouterLink>
      <button @click="deletePost(post.student_id)" class="btn btn-delete">Delete</button>
    </td>
  </tr>
</template>

<style scoped>
.action-buttons {
  display: flex;
  gap: 0.5rem;
  justify-content: center;
}

.btn {
  padding: 0.5rem 1rem;
  border-radius: 0.5rem;
  font-size: 0.875rem;
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

.btn-view {
  background-color: #00ff00;
  color: #000;
  box-shadow: 0 0 10px rgba(0, 255, 0, 0.5),
              0 0 20px rgba(0, 255, 0, 0.3);
  animation: viewGlow 2s ease-in-out infinite;
}

.btn-view:hover {
  background-color: #00ff00;
  transform: scale(1.05);
  box-shadow: 0 0 20px rgba(0, 255, 0, 0.7),
              0 0 40px rgba(0, 255, 0, 0.5);
  animation: viewGlow 0.5s ease-in-out infinite;
}

@keyframes viewGlow {
  0% { box-shadow: 0 0 10px rgba(0, 255, 0, 0.5), 0 0 20px rgba(0, 255, 0, 0.3); }
  50% { box-shadow: 0 0 20px rgba(0, 255, 0, 0.7), 0 0 40px rgba(0, 255, 0, 0.5); }
  100% { box-shadow: 0 0 10px rgba(0, 255, 0, 0.5), 0 0 20px rgba(0, 255, 0, 0.3); }
}

.btn-update {
  background-color: #0066ff;
  color: white;
  box-shadow: 0 0 10px rgba(0, 102, 255, 0.5),
              0 0 20px rgba(0, 102, 255, 0.3);
  animation: updateGlow 2s ease-in-out infinite;
}

.btn-update:hover {
  background-color: #0066ff;
  transform: scale(1.05);
  box-shadow: 0 0 20px rgba(0, 102, 255, 0.7),
              0 0 40px rgba(0, 102, 255, 0.5);
  animation: updateGlow 0.5s ease-in-out infinite;
}

@keyframes updateGlow {
  0% { box-shadow: 0 0 10px rgba(0, 102, 255, 0.5), 0 0 20px rgba(0, 102, 255, 0.3); }
  50% { box-shadow: 0 0 20px rgba(0, 102, 255, 0.7), 0 0 40px rgba(0, 102, 255, 0.5); }
  100% { box-shadow: 0 0 10px rgba(0, 102, 255, 0.5), 0 0 20px rgba(0, 102, 255, 0.3); }
}

.btn-delete {
  background-color: #ff0000;
  color: white;
  box-shadow: 0 0 10px rgba(255, 0, 0, 0.5),
              0 0 20px rgba(255, 0, 0, 0.3);
  animation: deleteGlow 2s ease-in-out infinite;
}

.btn-delete:hover {
  background-color: #ff0000;
  transform: scale(1.05);
  box-shadow: 0 0 20px rgba(255, 0, 0, 0.7),
              0 0 40px rgba(255, 0, 0, 0.5);
  animation: deleteGlow 0.5s ease-in-out infinite;
}

@keyframes deleteGlow {
  0% { box-shadow: 0 0 10px rgba(255, 0, 0, 0.5), 0 0 20px rgba(255, 0, 0, 0.3); }
  50% { box-shadow: 0 0 20px rgba(255, 0, 0, 0.7), 0 0 40px rgba(255, 0, 0, 0.5); }
  100% { box-shadow: 0 0 10px rgba(255, 0, 0, 0.5), 0 0 20px rgba(255, 0, 0, 0.3); }
}

/* RGB Animation for all buttons */
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
