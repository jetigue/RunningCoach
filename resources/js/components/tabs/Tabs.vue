<template>
    <div class="">
        <ul class="flex flex-col md:flex-row border-b border-gray-400 text-gray-700" role="tablist">
            <li
                v-for="(tab, index) in tabs"
                class="px-4 py-2 bg-white"
                :class="{ 'border border-b-0 rounded-t-lg text-black -mb-px': tab.isActive }">
                <button
                    v-text="tab.title"
                    :class="{ 'font-bold': tab.isActive }"
                    class="focus:outline-none"
                    role="tab"
                    :aria-selected="tab.isActive"
                    @click="activeTab = tab">
                </button>
            </li>
        </ul>

        <slot></slot>
    </div>
</template>

<script>
    export default {
        name: "Tabs",

        data() {
            return {
                tabs: [],
                activeTab: null
            };
        },

        mounted() {
            this.tabs = this.$children;

            this.setInitialActiveTab();
        },

        watch: {
            activeTab(activeTab) {
                this.tabs.map(tab => (tab.isActive = tab == activeTab));
            }
        },

        methods: {
            setInitialActiveTab() {
                this.activeTab = this.tabs.find(tab=> tab.active) || this.tabs[0];
            }
        }

    }
</script>

<style scoped>

</style>
