<template>
    <!-- Data Table area Start-->
    <div class="data-table-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="form-element-list">
                        <div class="cmp-tb-hd bcs-hd">
                            <h2>Ajouter Facture</h2>
                            <p><strong>NB: </strong>thank you for being careful with users functions, which will affect
                                automatically permissions and roles to use the system</p>
                        </div>
                        <div class="row">
                            <div class="form-group col-lg-6 col-sm-12">
                                <label for="provider" class="form-control-label">Fourniseur</label>
                                <select v-model="provider" class="form-control" id="provider" required>
                                    <option v-for="provider in providers" :value="provider.id">{{ provider.name }}</option>
                                </select>
                            </div>
                            <div class="form-group col-lg-6 col-sm-12">
                                <label for="serial_number" class="form-control-label">Numéro Facture</label>
                                <input class="form-control" type="text" placeholder="Numéro Facture"
                                       v-model="serial_number"
                                       name="serial_number"
                                       id="serial_number" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-lg-12 col-sm-12">
                                <hr>
                                <p>Ajouter PDR</p>
                            </div>
                        </div>
                        <div class="row" v-for="spare in materials">
                            <div class="form-group col-lg-8 col-sm-12">
                                <input :value="spare.code" class="form-control" type="text" disabled>
                            </div>
                            <div class="form-group col-lg-4 col-sm-12">
                                <input :value="spare.quantity" class="form-control" type="number" disabled>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-lg-6 col-sm-12">
                                <select v-model="material" class="form-control" id="toner_name" required>
                                    <option v-for="spare in spares" :value="spare">{{ spare.code }}</option>
                                </select>
                            </div>
                            <div class="form-group col-lg-4 col-sm-12">
                                <input v-model="quantity" class="form-control" type="number" placeholder="Quantité"
                                       name="quantity"
                                       id="quantity" required>
                            </div>
                            <div class="form-group col-lg-2 col-sm-12">
                                <label for="quantity" class="form-control-label"></label>
                                <a v-on:click="addSpare" class="btn btn-primary notika-btn-success block">Ajouter</a>
                            </div>
                        </div>
                        <div class="form-example-int mg-t-15">
                            <a v-on:click="addInvoice" class="btn btn-primary notika-btn-success">Ajouter facture</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Data Table area End-->
</template>

<script>
export default {
    name: "invoice",
    props: {
        csrf_token: String,
        providers: Array,
        spares: Array,
    },
    data() {
        return {
            provider: "",
            serial_number: "",

            material: {
                id: 0,
                code: ""
            },
            quantity: 0,
            materials: [],
        }
    },
    mounted() {
        console.log('Component mounted.')
    },
    methods: {
        addSpare(e) {
            e.preventDefault();

            if (this.material.material === "" || this.quantity === 0) {

                alert("Vérifier les champs")

            } else {
                const spare = {
                    id: this.material.id,
                    code: this.material.code,
                    quantity: this.quantity
                }

                this.materials = [...this.materials, spare]

                this.material = {
                    id: 0,
                    code: ""
                }
                this.quantity = 0
            }
        },
        async addInvoice() {

            if (this.provider === "" || this.serial_number === "") {

                alert("remplir la facture");

            } else {
                if (this.materials.length === 0 ) {
                    alert("facture vide")
                } else {
                    window.axios = require('axios');

                    // For adding the token to axios header (add this only one time).
                    window.axios.defaults.headers.common = {
                        'X-Requested-With': 'XMLHttpRequest',
                        'X-CSRF-TOKEN': this.csrf_token
                    };

                    await axios.post(
                        '/stock/invoices',
                        {
                            spares: this.materials,
                            provider: this.provider,
                            serial_number: this.serial_number
                        },
                    ).then(res => this.success(res))
                        .catch(err => alert(err.message))
                }
            }

        },
        success(response) {
            window.location = response.data.redirect;
        }
    }
}
</script>

<style scoped>

</style>
