<script setup>
defineProps({
	pagination: Object,
})
</script>

<template>
	<nav>
		<ul class="pagination justify-content-end">
			<li class="page-item">
				<Link
					:href="pagination.first_page_url ?? 'null'"
					class="btn btn-outline-primary me-2"
					:class="pagination.prev_page_url === null ? 'disabled' : ''"
					as="button"
					type="button"
					><<
				</Link>
			</li>
			<li class="page-item">
				<Link
					:href="pagination.prev_page_url ?? 'null'"
					:class="pagination.prev_page_url === null ? 'disabled' : ''"
					class="btn btn-outline-primary me-2"
					as="button"
					type="button"
					><
				</Link>
			</li>
			<li class="page-item">
				<Link
					:href="pagination.next_page_url ?? 'null'"
					:class="pagination.next_page_url === null ? 'disabled' : ''"
					class="btn btn-outline-primary me-2"
					as="button"
					type="button"
					>>
				</Link>
			</li>
			<li class="page-item">
				<Link
					:href="pagination.last_page_url ?? 'null'"
					:class="pagination.next_page_url === null ? 'disabled' : ''"
					class="btn btn-outline-primary me-2"
					as="button"
					type="button"
					>>>
				</Link>
			</li>
		</ul>
	</nav>
</template>
