<script setup>
    const props = defineProps({
        errors: Array
    })
</script>

<template>
    <div>
        <div v-for="(nestedErrors, index) in props.errors" :key="index">
            <ul>
                <li class="error" v-for="(error, indexInt) in nestedErrors" :key="indexInt">
                    {{ error }}
                </li>
            </ul>
            
        </div>
    </div>
    
</template>

<style scoped>
    .error {
        color: red;
    }
</style>