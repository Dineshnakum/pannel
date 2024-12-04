<template>
    <footer class="w-full bg-indigo-900 shadow">
        <div class="w-full mx-auto max-w-screen-xl p-4">
            <div v-if="daysLeft < 5" class="text-2xl text-red sm:text-center dark:text-red-500">
                <span v-if="daysLeft <= 0">
                    Today is the last day of your plan expiration.
                </span>
                <span v-else>
                    {{ daysLeft }} days to remaining in your plan expiration.
                </span>
            </div>
            <div class="text-sm text-white sm:text-center dark:text-white-900">Copyright © 2014 - 2024 <a href="https://cmwebsolution.com/" class="hover:underline text-green-500">CM WebSolution </a>. All Rights Reserved.
            </div>
        </div>
    </footer>
</template>

<script>
export default{
    props : { 
        daysLeft : Number,
    },
}
</script>