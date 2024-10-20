<script setup>
import AuthorForm from '@/Pages/Author/AuthorForm.vue'

defineProps({
	author: Object,
	errors: Object,
})
</script>

<template>
	<Head>
		<title>Criar Autor</title>
	</Head>
	<AuthorForm :errors="errors" :author="author" />
</template>
