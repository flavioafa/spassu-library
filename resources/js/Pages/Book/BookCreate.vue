<script setup>
import BookForm from '@/Pages/Book/BookForm.vue'

defineProps({
	book: Object,
	authors: Array,
	subjects: Array,
	errors: Object,
})
</script>

<template>
	<Head>
		<title>Criar Livro</title>
	</Head>
	<BookForm
		:errors="errors"
		:book="book"
		:subjects="subjects"
		:authors="authors"
	/>
</template>
