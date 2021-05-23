<template>
    <div>
        <h2>
            Latest transactions
        </h2>
        <latest-transaction-item />
        <latest-transaction-item />
        <latest-transaction-item />
        <latest-transaction-item />
    </div>
</template>
<script>
    import LatestTransactionItem from "./LatestTransactionItem";
    export default {
        components:{
            LatestTransactionItem
        }
    }
</script>
