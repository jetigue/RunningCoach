<template>
    <div>
        <form method="POST" enctype="multipart/form-data">
            <input type="file" class="py-4" name="physical-form" accept=".pdf, .jpg, .png" @change="onChange">
            <img :src="physical">
        </form>

    </div>
</template>

<script>
    export default {
        name: "PhysicalForm",

        props: ['data'],

        data() {
            return {
                physical: this.data.form_path,
            }
        },

        methods: {
            onChange(e) {
                if (! e.target.files.length) return;

                let physical = e.target.files[0];

                let reader = new FileReader();

                reader.readAsDataURL(physical);

                reader.onload = e => {
                    this.physical = e.target.result;
                };

                this.persist(physical);
            },

            persist(file) {
                let data = new FormData();

                data.append('physical-form', physical);

                axios.post(`/api/physicals/${this.data.id}/physical-form`, data)
            }
        }
    }
</script>
