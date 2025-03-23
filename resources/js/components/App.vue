<script>
export default {
    name: "App",
};
</script>

<script setup>
import { ref, onMounted } from "vue";
const props = defineProps({
    user: {
        type: Object,
        default: {},
    },
});

const promotion = ref(null);
const winnerMessage = ref(null);
onMounted(() => {
    window.Echo.channel("Promotions") // public!
        .listen(".new-promotion", (e) => {
            // dot is important!
            promotion.value = e;

            setTimeout(() => {
                promotion.value = null;
            }, 5000);
        });

    if (props.user?.id) {
        window.Echo.private("App.Models.User." + props.user?.id) // private!
            .listen(".you-are-the-winner", (e) => {
                winnerMessage.value = e;

                setTimeout(() => {
                    winnerMessage.value = null;
                }, 5000);
            });
    }
});
</script>

<template>
    <div class="container">
        <!-- show promotion -->
        <div v-if="promotion" class="alert alert-success">
            {{ promotion.title }}<br />
            {{ promotion.description }}
        </div>

        <!-- show winner message -->
        <div v-if="winnerMessage" class="alert alert-success">
            {{ winnerMessage.message }}
        </div>

        <slot />
    </div>
</template>
