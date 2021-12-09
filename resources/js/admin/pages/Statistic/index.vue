<template>
    <div class="container-fluid">
        <h3>Статистика</h3>
        <form v-on:submit.prevent="loadStatistic">
            <div class="row">
                <div class="col-6">
                    <label for="start-date">Начальная дата</label>
                    <input id="start-date" type="date" class="form-control w-100" v-model="start" required>
                </div>
                <div class="col-6">
                    <label for="end-date">Конечная дата</label>
                    <input id="end-date" type="date" class="form-control w-100" v-model="end" required>
                </div>
            </div>
            <div class="row">
                <div class="col-12 mt-2">
                    <button class="btn btn-primary">Получить статистику за период</button>
                </div>
            </div>
        </form>

        <div class="row mt-2">
            <div class="col-12">
                <p>Число верфицированных пользователей за период <strong>{{stat.verified_users_count}}</strong></p>
                <p>Число не верфицированных пользователей за период <strong>{{stat.not_verified_users_count}}</strong>
                </p>
                <p>Общее число пользователей за период <strong>{{stat.users_count}}</strong></p>
                <p>Число перевозчиков за период <strong>{{stat.transporters_count}}</strong></p>
                <p>Число клиентов за период <strong>{{stat.customers_count}}</strong></p>
                <p>Число не оплаченных заявок за период <strong>{{stat.not_payed_listings_count}}</strong></p>
                <p>Число оплаченных заявок за период <strong>{{stat.payed_listings_count}}</strong></p>
                <p>Число комментариев за период <strong>{{stat.blog_comments_count}}</strong></p>
                <p>Число отзывов за период <strong>{{stat.reviews_count}}</strong></p>
                <p>Число платежей за период <strong>{{stat.all_payments_count}}</strong></p>
                <p>Число успешных платежей за период <strong>{{stat.success_payments_count}}</strong></p>
                <p>Число неудачных платежей за период <strong>{{stat.failed_payments_count}}</strong></p>
                <p>Сумма полученных оплат за период <strong>{{stat.payments_sum}}</strong> Eur</p>
            </div>
        </div>
    </div>
</template>

<script>

export default {
    data() {
        return {
            start: null,
            end: null,
            stat: {
                verified_users_count: 0,
                not_verified_users_count: 0,
                users_count: 0,
                transporters_count: 0,
                not_payed_listings_count: 0,
                payed_listings_count: 0,
                blog_comments_Count: 0,
                customers_count: 0,
                reviews_count: 0,
                all_payments_count: 0,
                success_payments_count: 0,
                failed_payments_count: 0,
                payments_sum: 0
            }
        }
    },
    mounted() {
        this.loadCurrentDayStatistic();
    },
    methods: {
        loadCurrentDayStatistic() {
            axios.get('/statistic/current-day').then(resp => {
                this.stat = resp.data
            })
        },
        loadStatistic() {
            axios.post('/statistic/period', {
                from: this.start,
                to: this.end
            }).then(resp => {
                this.stat = resp.data
            })
        }
    }
}
</script>

<style scoped>

</style>
