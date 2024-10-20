<script setup>
import { useForm } from '@inertiajs/vue3'

const props = defineProps({
	errors: Object,
	subject: Object,
})

const form = useForm({
	id: props.subject?.id,
	description: props.subject?.description,
})

const submit = () => {
	form.id ? form.put(`/assuntos/${form.id}`) : form.post('/assuntos')
}
</script>

<template>
	<form @submit.prevent="submit" class="row g-3 needs-validation">
		<div class="row">
			<div>
				<label for="name" class="form-label">Descrição</label>
				<div class="input-group has-validation">
					<input
						type="text"
						class="form-control"
						:class="errors.description ? 'is-invalid' : ''"
						id="description"
						v-model="form.description"
						aria-describedby="validationDescription"
					/>
					<div id="validationDescription" class="invalid-feedback">
						{{ errors.description }}
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
					href="/assuntos"
					as="button"
					type="button"
					class="btn btn-danger float-end me-2"
					>Cancelar
				</Link>
			</div>
		</div>
	</form>
</template>
