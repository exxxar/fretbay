<template>
    <div class="dropdown" v-if="options">

        <!-- Dropdown Input -->
        <b-form-input class="dropdown-input form-control"
                      @focus="showOptions()"
                      @blur="handleBlur"
                      @update="runSearch"
                      @keyup="keyMonitor"
                      v-model="searchFilter"
                      :disabled="disabled"
                      :placeholder="placeholder"
                      type="text" debounce="600"
                      autocomplete="off"
        >
        </b-form-input>
<!--        <input class="dropdown-input form-control"-->
<!--               @focus="showOptions()"-->
<!--               @blur="handleBlur"-->
<!--               @input="getAddress"-->
<!--               @keyup="keyMonitor"-->
<!--               v-model="searchFilter"-->
<!--               :disabled="disabled"-->
<!--               :placeholder="placeholder" />-->

        <!-- Dropdown Menu -->
        <div class="dropdown-content w-100" v-show="optionsShown">
            <div
                class="dropdown-item"
                @mousedown="selectOption(option)"
                v-for="(option, index) in options"
                :key="index"
            >
                {{ option.place_name }}
            </div>
        </div>
    </div>
</template>

<script>
    import _ from 'lodash';
    export default {
        name: 'AddressInput',
        props: {
            // name: {
            //     type: String,
            //     required: false,
            //     default: 'dropdown',
            //     note: 'Input name'
            // },
            // options: {
            //     type: Array,
            //     required: true,
            //     default: [],
            //     note: 'Options of dropdown. An array of options with id and name',
            // },
            address: {
                note: 'Input v-model'
            },
            placeholder: {
                type: String,
                required: false,
                default: 'Please select an option',
                note: 'Placeholder of dropdown'
            },
            disabled: {
                type: Boolean,
                required: false,
                default: false,
                note: 'Disable the dropdown'
            },
            maxItem: {
                type: Number,
                required: false,
                default: 6,
                note: 'Max items showing'
            }
        },
        model: {
            prop: 'address',
            event: 'blur'
        },
        data() {
            return {
                selected: {},
                optionsShown: false,
                searchFilter: this.address,
                options:[],
            }
        },
        created() {
            // this.$emit('selected', this.selected);
            // this.selected = this.address;
            // this.searchFilter = this.address.place_name;

            window.eventBus.$on("address_input", () =>{
               this.searchFilter = null
                this.selected = {}
            });
        },
        computed: {
            filteredOptions() {
                const filtered = [];
                const regOption = new RegExp(this.searchFilter, 'ig');
                for (const option of this.options) {
                    if (this.searchFilter.length < 1 || option.place_name.match(regOption)){
                        if (filtered.length < this.maxItem) filtered.push(option);
                    }
                }
                return filtered;
            }
        },
        methods: {

            handleBlur (value) {
                this.$emit('blur', value);
                this.exit();
            },
            selectOption(option) {
                this.selected = option;
                this.optionsShown = false;
                this.searchFilter = this.selected.place_name;
                this.$emit('selected', this.selected);
            },
            showOptions(){
                if (!this.disabled) {
                    this.searchFilter = '';
                    this.optionsShown = true;
                }
            },
            exit() {
                if (!this.selected.id) {
                    this.selected = {};
                    // this.searchFilter = '';
                } else {
                    this.searchFilter = this.selected.place_name;
                }
                this.$emit('selected', this.selected);
                this.optionsShown = false;
            },
            // Selecting when pressing Enter
            keyMonitor: function(event) {
                if (event.key === "Enter" && this.options[0])
                    this.selectOption(this.options[0]);
            },
            getAddress: _.debounce(function(e)  {
                if (this.searchFilter.trim() !=='') {
                    this.selected = {};
                    this.runSearch();
                }

            }, 500),
            async runSearch() {
                if (this.searchFilter.trim() !=='') {
                    this.selected = {};
                    await axios
                        .get('/api/getAddress/' + this.searchFilter + '/en')
                        .then(resp => {
                            this.options = resp.data
                        })
                }
            }
        },
        watch: {
            // searchFilter() {
            //     if (this.filteredOptions.length === 0) {
            //         this.selected = {};
            //     } else {
            //         this.selected = this.filteredOptions[0];
            //     }
            //     this.$emit('filter', this.searchFilter);
            // }
        }
    };
</script>


<style lang="scss" scoped>
.dropdown-content {
    position: absolute;
    background: white;
    word-break: break-word;
    z-index: 1000000;
    border: 1px #21c87a solid;
    border-radius: 0px 0px 5px 5px;

    .dropdown-item {
        white-space: inherit;
        &:hover {
            background: #21c87a;
            color: white;
            cursor:pointer;
        }
    }
}
</style>
