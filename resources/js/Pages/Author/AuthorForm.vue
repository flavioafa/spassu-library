<script setup>
import { useForm } from '@inertiajs/vue3'

const props = defineProps({
	errors: Object,
	author: Object,
})

const form = useForm({
	id: props.author?.id,
	name: props.author?.name,
})

const submit = () => {
	form.id ? form.put(`/autores/${form.id}`) : form.post('/autores')
}
</script>

<template>
	<form @submit.prevent="submit" class="row g-3 needs-validation">
		<div class="row">
			<div>
				<label for="name" class="form-label">Nome</label>
				<div class="input-group has-validation">
					<input
						type="text"
						class="form-control"
						:class="errors.name ? 'is-invalid' : ''"
						id="name"
						v-model="form.name"
						aria-describedby="validationName"
					/>
					<div id="validationName" class="invalid-feedback">
						{{ errors.name }}
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="mt-2">
				<button
					class="btn float-end"
					:class="form.id ? 'btn-primary' : 'btn-success'"
					type="submit"
					:disabled="form.processing"
				>
					{{ form.id ? 'Alterar' : 'Criar' }}
				</button>
				<Link
					href="/autores"
					as="button"
					type="button"
					class="btn btn-danger float-end me-2"
					>Cancelar
				</Link>
			</div>
		</div>
	</form>
</template>
