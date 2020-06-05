<template>
    <div class="flex flex-col w-full md:w-1/2 md:mr-2">
        <div class="flex content-end">
            <label class="form-label" for="form.warmUpDuration">Duration</label>
            <span id="durationHelp" class="form-help" v-if="form.errors.has('duration')"
                  v-text="form.errors.get('duration')">
        </span>
            </div>
            <input class="form-input"
                   id="form.warmUpDuration"
                   type="number"
                   min="1"
                   v-model="form.duration"
                   required>
    </div>
</template>

<script>
    export default {
        name: "TrainingDuration"
    }
</script>

<style scoped>

</style>
