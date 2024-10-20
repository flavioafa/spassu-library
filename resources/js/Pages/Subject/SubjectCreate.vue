<script setup>
import SubjectForm from '@/Pages/Subject/SubjectForm.vue'

defineProps({
	subject: Object,
	errors: Object,
})
</script>

<template>
	<Head>
		<title>Criar Assunto</title>
	</Head>
	<SubjectForm :errors="errors" :subject="subject" />
</template>
