<template>
    <div role="tablist" class="w-50">
        <b-card no-body>
            <b-card-header header-tag="header" role="tab">
                <b-button block variant="info">Step 1: Your details</b-button>
            </b-card-header>
            <b-collapse id="accordion-1" visible accordion="my-accordion" role="tabpanel">
                <b-card-body>
                    <b-form class="form-collapse" @submit="onSubmit" v-if="show">
                        <div class="d-inline-flex">
                            <b-form-group id="input-group-1" label="First Name:" label-for="input-1">
                                <b-form-input
                                        id="input-1"
                                        v-model="form.name"
                                        required>
                                </b-form-input>
                            </b-form-group>
                            <b-form-group id="input-group-2" label="Surname:" label-for="input-2">
                                <b-form-input
                                        id="input-2"
                                        v-model="form.surname"
                                        required>
                                </b-form-input>
                            </b-form-group>
                        </div>
                        <b-form-group
                                id="input-group-3"
                                label="Email Address:"
                                label-for="input-3">
                            <b-form-input
                                    id="input-3"
                                    v-model="form.email"
                                    type="email"
                                    required>
                            </b-form-input>
                        </b-form-group>

                        <div class="d-flex flex-row-reverse">
                            <b-button class="next" type="submit">Next &gt;</b-button>
                        </div>

                    </b-form>
                </b-card-body>
            </b-collapse>

            <b-card-header header-tag="header" class="" role="tab">
                <b-button block variant="info">Step 2: More comments</b-button>
            </b-card-header>
            <b-collapse id="accordion-2" accordion="my-accordion" role="tabpanel">
                <b-card-body>
                    <b-form class="form-collapse" @submit="onSubmit" v-if="show">
                        <div class="d-inline-flex">
                            <b-form-group id="input-group-4" label="First Name:" label-for="input-1">
                                <b-form-input
                                        id="input-4"
                                        v-model="form.name"
                                        required>
                                </b-form-input>
                            </b-form-group>
                            <b-form-group id="input-group-5" label="Surname:" label-for="input-2">
                                <b-form-input
                                        id="input-5"
                                        v-model="form.surname"
                                        required>
                                </b-form-input>
                            </b-form-group>
                        </div>
                        <b-form-group
                                id="input-group-6"
                                label="Email Address:"
                                label-for="input-3">
                            <b-form-input
                                    id="input-6"
                                    v-model="form.email"
                                    type="email"
                                    required>
                            </b-form-input>
                        </b-form-group>

                        <div class="d-flex flex-row-reverse">
                            <b-button class="next" type="submit">Next &gt;</b-button>
                        </div>

                    </b-form>
                </b-card-body>
            </b-collapse>

            <b-card-header header-tag="header" class="" role="tab">
                <b-button block variant="info">Step 3: Final comments</b-button>
            </b-card-header>
            <b-collapse id="accordion-3" accordion="my-accordion" role="tabpanel">
                <b-card-body>
                    <b-card-text>{{ text }}</b-card-text>
                </b-card-body>
            </b-collapse>
        </b-card>
    </div>
</template>

<script>
    export default {
        name: "SubscribeComponent",
        data() {
            return {
                text: "BLA BLA",
                form: {
                    name: '',
                    surname: '',
                    email: '',
                },
                show: true,
            }
        },
        methods: {
            onSubmit(evt) {
                evt.preventDefault();
                this.$root.$emit('bv::toggle::collapse', 'accordion-1');
                this.$root.$emit('bv::toggle::collapse', 'accordion-2');
                alert(JSON.stringify(this.form))
            },
        },
    }
</script>

<style scoped>
    body{
        font-family: Arial,sans-serif;
    }
    .form-collapse{
        font-family: "Myriad Pro", sans-serif;
        font-size: 16px;
        line-height: 1.125;
    }
    .form-control{
        width: auto;
        border-radius: 10px;
        box-shadow: inset 0 0 10px rgba(0, 0, 0, 0.5);
    }
    .form-control#input-1  {
        margin-right: 1rem;
    }
    .next{
        border-radius: 10px;
        background-image: linear-gradient(to bottom, #424cb4, #4f51b9, #5b57bf, #665cc4, #7162ca);
        padding: 0.5rem 2rem;
    }
    .card{
        border-radius: 10px;
        background-color: rgb(255, 255, 255);
        box-shadow: 0 0 27px rgba(29, 33, 36, 0.2);
    }
    .card-header:first-child{
        padding-top: 5px;
    }
    .card-header:last-child{
        padding-bottom: 5px;
    }
    .card-header{
        padding: 3px 5px 3px 5px;
        background-color: transparent !important;
        border-bottom: none !important;
        z-index: 10;
    }
    .btn{
        font-size: 16px;
        font-family: Arial,sans-serif;
        color: rgb(255, 255, 255);
        line-height: 1.125;
        text-align: left;
        text-shadow: 0 1px 0 rgba(104, 104, 104, 0.8);
    }
    .btn-info{
        border-radius: 10px;
        color: #fff;
        background-color: #ffc600;
        border-color: transparent;
        background-image: linear-gradient(to bottom, #fdc401, #fabc04, #f6b307, #f2ab0b, #eea30e);
        height: 59px;
    }

    .btn-info:not(:disabled):not(.disabled):active,
    .btn-info:not(:disabled):not(.disabled).active,
    .show > .btn-info.dropdown-toggle{
        color: #fff;
        border-color: transparent;
        background-image: inherit;
    }

    .btn-info:not(:disabled):not(.disabled):active,
    .btn-info:not(:disabled):not(.disabled).active,
    .show > .btn-info.dropdown-toggle{
        border-color: transparent;
        background-image: linear-gradient(to bottom, #fdc401, #fabc04, #f6b307, #f2ab0b, #eea30e);
    }
    .btn-info:not(:disabled):not(.disabled):active:focus,
    .btn-info:not(:disabled):not(.disabled).active:focus,
    .show > .btn-info.dropdown-toggle:focus{
        box-shadow: 0 0 0 0.2rem rgba(242, 171, 11, 0.5);
    }
    .btn-info:focus, .btn-info.focus{
        box-shadow: none;
    }
    .card-body{
        margin: -15px 5px 5px 5px;
        border-top-right-radius: 0px;
        border-top-left-radius: 0px;
        border-bottom-right-radius: 10px;
        border-bottom-left-radius: 10px;
        background: #dedede;
        z-index: 1;
    }
</style>