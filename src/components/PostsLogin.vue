<template>
  <IonPage class="login-page">
    <IonContent class="ion-padding">
      <div class="login-container">
        <div class="content">
          <h1 class="title">Login</h1>
          <form @submit.prevent="handleLogin" class="form">
            <div class="form-group">
              <IonInput
                label="Username"
                labelPlacement="floating"
                fill="outline"
                v-model="username"
                class="input"
                required
              />
            </div>
            <div class="form-group">
              <IonInput
                label="Password"
                labelPlacement="floating"
                fill="outline"
                type="password"
                v-model="password"
                class="input"
                required
              />
            </div>
            <IonButton expand="block" class="btn btn-green" type="submit">
              Login
            </IonButton>
          </form>
        </div>
      </div>
      <IonAlert
        :is-open="showAlert"
        :header="alertHeader"
        :message="alertMessage"
        :buttons="alertButtons"
        @didDismiss="showAlert = false"
      />
    </IonContent>
  </IonPage>
</template>

<script setup>
import { ref } from 'vue'
import axios from 'axios'
import { useRouter } from 'vue-router'
import {
  IonPage,
  IonContent,
  IonInput,
  IonButton,
  IonAlert
} from '@ionic/vue'

const username = ref('')
const password = ref('')
const router = useRouter()

// Alert control
const showAlert = ref(false)
const alertHeader = ref('')
const alertMessage = ref('')
const alertButtons = ref(['OK'])

const handleLogin = async () => {
  if (!username.value || !password.value) {
    alertHeader.value = 'Validasi'
    alertMessage.value = 'Username dan password wajib diisi.'
    alertButtons.value = ['OK']
    showAlert.value = true
    return
  }

  try {
    const response = await axios.post('http://localhost/belajar-api/login.php', {
      username: username.value,
      password: password.value
    })

    if (response.data.status === 'success') {
      localStorage.setItem('user', JSON.stringify(response.data.data))
      alertHeader.value = 'Login Berhasil'
      alertMessage.value = 'Selamat datang!'
      alertButtons.value = [{
        text: 'OK',
        handler: () => {
          router.push('/home')
        }
      }]
      showAlert.value = true
    } else {
      alertHeader.value = 'Login Gagal'
      alertMessage.value = 'Username atau password salah.'
      alertButtons.value = ['OK']
      showAlert.value = true
    }
  } catch (error) {
    alertHeader.value = 'Error'
    alertMessage.value = 'Tidak dapat terhubung ke server.'
    alertButtons.value = ['OK']
    showAlert.value = true
  }
}
</script>

<style scoped>
.login-page {
  --background: linear-gradient(135deg, #4caf50, #81c784);
  min-height: 100vh;
}

.login-container {
  min-height: 100vh;
  display: flex;
  justify-content: center;
  align-items: center;
}

.content {
  max-width: 400px;
  width: 100%;
  background: rgba(255,255,255,0.12);
  border-radius: 1rem;
  padding: 2rem;
  box-shadow: 0 4px 16px rgba(0,0,0,0.08);
  color: #222;
  text-align: center;
}

.title {
  font-size: 2rem;
  font-weight: bold;
  margin-bottom: 1.5rem;
  color: #222;
}

.form {
  display: flex;
  flex-direction: column;
  gap: 1.5rem;
}

.form-group {
  text-align: left;
}

.input {
  --background: #fff;
  --color: #222;
  border-radius: 0.5rem;
  font-size: 1rem;
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
}

.btn-green {
  --background: #2e7d32;
  --background-hover: #1b5e20;
  --color: #fff;
}

.btn-green:hover {
  filter: brightness(0.95);
  transform: scale(1.05);
}
</style>