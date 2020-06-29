<template>
  <div style="position:absolute;">
    <!--MODAL -->
    <b-modal
      :id="modalId"
      cancel-variant="empty"
      ok-variant="primary"
      :ok-title="okTitle"
      @ok="onOk"
      @cancel="onCancel"
      :no-close-on-esc="true"
      :hide-header="modalTitle === ''"
      :hide-footer="hasFooter === false"
      :no-close-on-backdrop="closeOnBackdrop === false"
      size="lg"
    >
      <div slot="modal-header">
        <h5 class="modal-title mb-0">{{ modalTitle }}</h5>
      </div>
      <slot slot="default"></slot>
      <slot name="modal-footer" slot="modal-footer"></slot>
    </b-modal>

    <b-modal
      :id="modalId + '-success'"
      size="sm"
      :hide-header="true"
      :ok-title="successModalOkTitle"
      :no-close-on-esc="true"
      no-close-on-backdrop
    >
      <div class="text-center" slot="default">
        <img src="/img/graphics/success.png" width="200px" class="mx-auto mb-3" />
        <h6 class="font-weight-bold mb-0">Success!</h6>
      </div>
      <button slot="modal-footer" class="mx-auto btn btn-primary" data-dismiss="modal" @click="onSuccessOk">{{ successModalOkTitle }}</button>
    </b-modal>
  </div>
</template>

<script>
export default {
  created() {
    EventBus.listen('formSubmitSuccess', this.onFormSubmitSuccess)
  },
  props: {
    modalId: {
      required: true,
      type: String
    },

    modalTitle: {
      type: String,
      default: ''
    },

    hasFooter: {
      type: Boolean,
      default: true
    },

    closeOnBackdrop: {
      type: Boolean,
      default: false
    },

    okTitle: {
      default: 'Add',
      type: String
    },

    successModalOkTitle: {
      default: 'OK',
      type: String
    }
  },
  methods: {  
    onOk(e) {
      e.preventDefault()
      EventBus.fire('formSubmit', {target: this.modalId, event: e})
    },

    onFormSubmitSuccess(e) {
      console.log('triggered', e, this.modalId)
      
      if (e !== this.modalId) {
        return
      }

      this.$bvModal.hide(e)

      this.$bvModal.show(`${this.modalId}-success`)
    },

    onSuccessOk() {
      this.$bvModal.hide(`${this.modalId}-success`)
      EventBus.fire('onSuccessModalOK', this.modalId)
    },

    onCancel(e) {
      EventBus.fire('modalCancel', this.modalId)
    }
  }
}
</script>