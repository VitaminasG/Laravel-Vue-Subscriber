<template>
    <div role="tablist" class="w-50">
        <b-card no-body>

            <!-- First Collapse -->

            <b-card-header header-tag="header" role="tab">
                <b-button block v-b-toggle.accordion-1 variant="info">Step 1: Your details</b-button>
            </b-card-header>

            <b-collapse id="accordion-1" visible accordion="my-accordion" role="tabpanel">
                <b-card-body>
                    <b-form class="form-collapse" @submit="levelOne">
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

            <!-- Second Collapse -->

            <b-card-header header-tag="header" class="" role="tab">
                <b-button block v-b-toggle.accordion-2 variant="info">Step 2: More comments</b-button>
            </b-card-header>

            <b-collapse id="accordion-2" accordion="my-accordion" role="tabpanel">
                <b-card-body>
                    <b-form class="form-collapse" @submit="levelTwo">
                        <div class="d-inline-flex">
                            <b-form-group id="input-group-4" label="Telephone number">
                                <b-form-input
                                        id="input-4"
                                        v-model="form.telephone"
                                        required>
                                </b-form-input>
                            </b-form-group>
                            <b-form-group id="input-group-5" label="Gender" class="ml-4">
                                <b-form-select v-model="form.gender" :options="options"></b-form-select>
                            </b-form-group>
                        </div>
                        <b-form-group id="input-group-6" label="Date of birth">

                            <div class="d-inline-flex">
                                <b-form-input
                                        id="input-7"
                                        v-model="form.dof.day"
                                        type="text"
                                        class="mr-1 dof"
                                        required>
                                </b-form-input>

                                <b-form-input
                                        id="input-8"
                                        v-model="form.dof.month"
                                        type="text"
                                        class="mr-1 dof"
                                        required>
                                </b-form-input>

                                <b-form-input
                                        id="input-9"
                                        v-model="form.dof.year"
                                        type="text"
                                        class="mr-1 dof"
                                        required>
                                </b-form-input>
                            </div>

                        </b-form-group>

                        <div class="d-flex flex-row-reverse">
                            <b-button class="next" type="submit">Next &gt;</b-button>
                        </div>

                    </b-form>
                </b-card-body>
            </b-collapse>

            <!-- Third Collapse -->

            <b-card-header header-tag="header" class="" role="tab">
                <b-button block v-b-toggle.accordion-3 variant="info">Step 3: Final comments</b-button>
            </b-card-header>

            <b-collapse id="accordion-3" accordion="my-accordion" role="tabpanel">
                <b-card-body>
                    <b-form class="form-collapse" @submit="levelThree">

                    <b-container fluid>
                        <b-row align-v="end">
                            <b-col>
                                <label for="textarea">Comments</label>
                                <b-form-textarea
                                        id="textarea"
                                        v-model="form.comments"
                                        rows="5"
                                        class="comment"
                                        no-resize>
                                </b-form-textarea>
                            </b-col>
                            <b-col>
                                <div class="d-flex flex-row-reverse">
                                    <b-button class="next" type="submit">Next &gt;</b-button>
                                </div>
                            </b-col>
                        </b-row>
                    </b-container>

                    </b-form>
                </b-card-body>
            </b-collapse>

        </b-card>
    </div>
</template>

<script>

    import axios from 'axios';
    export default {
        name: "SubscribeComponent",
        data() {
            return {
                step1: false,
                step2: false,
                form: {
                    name: '',
                    surname: '',
                    email: '',
                    telephone: '',
                    gender: null,
                    dof: {
                        day: '',
                        month: '',
                        year: '',
                    },
                    comments: ''
                },
                options: [
                    { value: null, text: 'Select Gender' + ' v'},
                    { value: 'Female', text: 'Female'},
                    { value: 'Male', text: 'Male'},
                    { value: 'Both', text: 'Both'},
                ],
                show: true,
            }
        },
        methods: {
            levelOne(e) {
                e.preventDefault();
                if( this.checkLength(this.form.name, 5) &&  this.checkLength(this.form.surname, 5) ) {

                    if( this.checkEmail(this.form.email) ) {
                        this.step1 = true;
                        this.$root.$emit('bv::toggle::collapse', 'accordion-1');
                        this.$root.$emit('bv::toggle::collapse', 'accordion-2');
                    } else {
                        alert('Incorrect email address!');
                    }
                } else {
                    alert('Your Name or Surname is too short!');
                }
            },
            levelTwo(e) {
                e.preventDefault();

                if ( this.checkPhone(this.form.telephone) ) {
                    if ( !this.form.gender ) {
                        alert('Please choose your Gender!');
                    } else {
                        if ( this.checkBof( this.form.dof.day, this.form.dof.month, this.form.dof.year) ) {
                            this.step2 = true;
                            this.$root.$emit('bv::toggle::collapse', 'accordion-2');
                            this.$root.$emit('bv::toggle::collapse', 'accordion-3');
                        } else {
                            alert('Date of birth is incorrect!')
                        }
                    }
                } else {
                    alert('Incorrect phone number!');
                }

            },
            levelThree(e) {
                e.preventDefault();

                let stepState = new Map([ ['1', this.step1], ['2', this.step2] ]);
                let state = false;
                let missingField = '';

                for ( let [key, value] of stepState ) {
                    if( !value ) {
                        alert('A Step' + key + ' have some missing fields!');
                        missingField = key;
                        state = false;
                        break;
                    } else {
                        state = true;
                    }
                }

                if (!state) {
                    this.$root.$emit('bv::toggle::collapse', 'accordion-3');
                    this.$root.$emit('bv::toggle::collapse', 'accordion-' + missingField);
                } else {
                    this.$root.$emit('bv::toggle::collapse', 'accordion-3');
                    this.submit();
                }
            },
            checkLength(item, length) {
                return item.length > length;
            },
            checkEmail(email) {
                if ( this.checkLength( email, 0) ) {
                    let regEx = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
                    return regEx.test(String(email).toLowerCase());
                }
            },
            checkPhone(phone) {
                let regEx = /^\d+$/;
                return !!(this.checkLength(phone, 10) && regEx.test(phone));
            },
            checkBof(day, month, year) {
                let regEx = /^\d+$/;
                let array = [day, month, year];

                let state = false;

                if ( this.checkLength(day, 1) && this.checkLength(month, 1)) {
                    if (this.checkLength(year, 3)) {
                        for (let e of array) {
                            if ( !regEx.test(e) ) {
                                alert(e + ' is not a number');
                                state = false;
                                break;
                            } else {
                                state = true;
                            }
                        }
                        return state;
                    } else {
                        alert('Incorrect year!');
                        return state;
                    }
                } else {
                    alert('Incorrect day or month!');
                    return state;
                }
            },
            submit() {

                let message = '';
                let data = {
                    fName: this.form.name,
                    lName: this.form.surname,
                    email: this.form.email,
                    mobile: this.form.telephone,
                    gender: this.form.gender,
                    DOB: this.form.dof.day + '/' + this.form.dof.month + '/' + this.form.dof.year,
                    comments: this.comments
                };

                axios.post('/subscribe', data)
                    .then( response => {
                        console.log(response.data);
                        this.showMsgBoxTwo(response.data);
                    })
                    .catch( error => {
                        console.log(error);
                    });

            },
            showMsgBoxTwo(message) {
                this.$bvModal.msgBoxOk(message, {
                    size: 'md',
                    buttonSize: 'md',
                    okVariant: 'success',
                    headerClass: 'p-2 border-bottom-0',
                    footerClass: 'p-2 border-top-0',
                    centered: true
                });
            }
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
    .comment {
        width: 100%;
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
        border-radius: 0 0 10px 10px;
        background: #dedede;
        z-index: 1;
    }
    .custom-select {
        color: #737171;
        border-radius: 10px;
        background: linear-gradient(0deg, rgba(85,85,85,0.2) 0%, rgba(255, 255, 255, 1) 50%);
        box-shadow: inset 0 0 5px rgba(0, 0, 0, 0.5);
    }
    .dof {
        width: 50px;
    }
</style>
