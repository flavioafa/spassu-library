<script>
export default {
	layout: null,
}
</script>

<script setup>
defineProps({
	errors: Array,
	status: Number,
})
</script>

<template>
	<Head>
		<title>Error</title>
	</Head>
	{{ status }}
</template>
