<template>
    <div class="absolute z-10 -mt-16 -ml-56">
      <div class="bg-white shadow-xl text-black text-xs rounded py-1 px-4">
          <slot></slot>
        <svg class="absolute text-white h-2 w-full left-0 top-full" x="0px" y="0px" viewBox="0 0 255 255" xml:space="preserve"><polygon class="fill-current" points="0,0 127.5,127.5 255,0"/></svg>
      </div>
    </div>
</template>

<script>
    export default {
        name: "AthleteVdotTooltip"
    }
</script>

<style scoped>
  .bottom-full{bottom: 100%}
  .top-full{top: 100%}
</style>
