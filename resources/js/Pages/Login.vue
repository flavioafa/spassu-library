<script>
export default {
	layout: null,
}
</script>

<script setup>
import { ref } from 'vue'
import { router } from '@inertiajs/vue3'

const email = ref('')

const password = ref('')

const login = () => {
	router.post('/login', {
		email: email.value,
		password: password.value,
	})
}
</script>

<template>
	<Head>
		<title>Login</title>
	</Head>
	<div class="container mt-5">
		<div class="row justify-content-center">
			<div class="col-md-6">
				<div class="card">
					<div class="card-header">Login</div>
					<div class="card-body">
						<form @submit.prevent="login">
							<div class="mb-3">
								<label for="email" class="form-label">Email</label>
								<input
									v-model="email"
									type="email"
									class="form-control"
									id="email"
									placeholder="Informe seu Email"
									required
								/>
							</div>
							<div class="mb-3">
								<label for="password" class="form-label">Senha</label>
								<input
									v-model="password"
									type="password"
									class="form-control"
									id="password"
									placeholder="Informe sua Senha"
									required
								/>
							</div>
							<button type="submit" class="btn btn-primary">Entrar</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</template>

<style scoped></style>
