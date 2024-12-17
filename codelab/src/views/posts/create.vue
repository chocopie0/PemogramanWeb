<script setup>
    // Import ref
    import { ref } from "vue";
    // Import router
    import { useRouter } from 'vue-router';
    // Import API
    import { createPost } from "../../api";

    // Init router
    const router = useRouter();

    // Define state
    const image = ref("");
    const title = ref("");
    const content = ref("");
    const errors = ref([]);

    // Method for handling file changes
    const handleFileChange = (e) => {
        // Assign file to state
        image.value = e.target.files[0];
    };

    // Method to store post
    const storePost = async () => {
        // Init formData
        let formData = new FormData();

        // Assign state value to formData
        formData.append("image", image.value);
        formData.append("title", title.value);
        formData.append("content", content.value);

        // Store data with API
        try {
            await createPost(formData);
            // Redirect to posts page after successful creation
            router.push({ path: "/posts" });
        } catch (error) {
            // Check if error.response exists before trying to access it
            if (error.response && error.response.data) {
                errors.value = error.response.data;
            } else {
                console.error("Error without response data:", error);
                errors.value = ["An unexpected error occurred"];
            }
        }
    };
</script>

<template>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 rounded shadow">
                    <div class="card-body">
                        <form @submit.prevent="storePost()">
                            <div class="mb-3">
                                <label class="form-label fw-bold">Image</label>
                                <input type="file" class="form-control" @change="handleFileChange($event)">
                                <div v-if="errors.image" class="alert alert-danger mt-2">
                                    <span>{{ errors.image[0] }}</span>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold">Title</label>
                                <input type="text" class="form-control" v-model="title" placeholder="Title Post">
                                <div v-if="errors.title" class="alert alert-danger mt-2">
                                    <span>{{ errors.title[0] }}</span>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold">Content</label>
                                <textarea class="form-control" v-model="content" rows="5" placeholder="Content Post"></textarea>
                                <div v-if="errors.content" class="alert alert-danger mt-2">
                                    <span>{{ errors.content[0] }}</span>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-md btn-primary rounded-sm shadow border-0">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
