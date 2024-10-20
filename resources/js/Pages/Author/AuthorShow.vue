<script setup>
import AuthorForm from '@/Pages/Author/AuthorForm.vue'

defineProps({
	author: Object,
	errors: Object,
})
</script>

<template>
	<Head>
		<title>Alterar Autor</title>
	</Head>
	<AuthorForm :errors="errors" :author="author" />
</template>
