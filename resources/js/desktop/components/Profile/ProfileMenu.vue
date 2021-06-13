<template>
    <div class="col-md-4 sidebar">
        <ul class="c-sidebar-list">
            <li class="has-menu">
                <a class="tab-link1" @click="activate(1)" :class="{ 'active-item-menu': activeElement == 1 }">My
                    account</a>
                <ul class="sub-menu" :class="{ 'active-sub-menu': activeElement == 1 }">
                    <li><a href="#">My identity</a></li>
                    <li><a href="#">Email</a></li>
                </ul>
            </li>
            <li class="has-menu"><a class="tab-link2" @click="activate(2)"
                                    :class="{ 'active-item-menu': activeElement == 2 }">My company</a>
                <ul class="sub-menu" :class="{ 'active-sub-menu': activeElement == 2 }">
                    <li><a href="#">Company details</a></li>
                    <li><a href="#">Company introduction</a></li>
                    <li><a href="#">About the payment</a></li>
                    <li><a href="#">Spoken languages</a></li>
                    <li><a href="#">Your transport expertise</a></li>
                </ul>
            </li>
            <li class="has-menu"><a class="tab-link3" @click="activate(3)"
                                    :class="{ 'active-item-menu': activeElement == 3 }">Legal documents</a>
                <ul class="sub-menu" :class="{ 'active-sub-menu': activeElement == 3 }">
                    <li><a href="#">Kbis (trade register) extract</a></li>
                    <li><a href="#">ID card</a></li>
                    <li><a href="#">Transport license</a></li>
                    <li><a href="#">Pro. insurance</a></li>
                </ul>
            </li>
            <li class="has-menu"><a class="tab-link4" @click="activate(4)"
                                    :class="{ 'active-item-menu': activeElement == 4 }">My vehicles</a>
                <ul class="sub-menu" :class="{ 'active-sub-menu': activeElement == 4 }">
                    <li><a href="#">Your vehicles</a></li>
                    <li><a href="#">Drivers</a></li>
                </ul>
            </li>
            <li class="has-menu"><a class="tab-link5" @click="activate(5)"
                                    :class="{ 'active-item-menu': activeElement == 5 }">Settings</a>
                <ul class="sub-menu" :class="{ 'active-sub-menu': activeElement == 5 }">
                    <li><a href="#">Notifications</a></li>
                    <li><a href="#">Password</a></li>
                </ul>
            </li>
        </ul>
    </div>
</template>

<script>
    export default {
        methods: {
            activate: function (el) {
                this.activeElement = el;


                console.log("menu=>"+el)

                this.$emit("test", el)
            }
        },
        data() {
            return {
                activeElement: 1
            }
        }
    }
</script>
<style lang="scss">
    .has-menu {
        cursor: pointer;
    }
</style>
