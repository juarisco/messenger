<template>
  <b-media :right-align="writtenByMe" vertical-align="center" class="mb-2">
    <b-img :src="image" rounded="circle" slot="aside" width="48" height="48" alt="placeholder"/>
    <b-card>
      <slot></slot>
    </b-card>
  </b-media>
</template>

<script>
export default {
  props: { image: String, writtenByMe: Boolean },
  data() {
    return {};
  },
  mounted() {
    // console.log("Valor de writtenByMe: ", this.writtenByMe);
  }
};
</script>
