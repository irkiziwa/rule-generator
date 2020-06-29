<style scoped>
.flex-center {
  align-items: center;
  display: flex;
  justify-content: center;
}

.position-ref {
  position: relative;
}

.full-height {
  height: 100vh;
}

.content {
  text-align: center;
}
</style>

<template>
  <div class="flex-center position-ref full-height">
    <div class="content">
      <img src="/img/ia.png" alt="" style="width: 150px">
      <h3>Involve Asia Simple Rule Generator</h3>
      <b-button @click="showModal" variant="outline-primary">Add rule</b-button>
      <modal-component modalId="modal-form" okTitle="confirm">
        <add-rule-form />
      </modal-component>
    </div>
  </div>
</template>


<script>
export default {
  created() {
    
  },

  data() {
    return {
      
    }
  },

  methods: {
    showModal() {
      this.$bvModal.show('modal-form')
    }
  }
}
</script>