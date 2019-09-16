<template>
    <div v-if="count" class="card">
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                <tr style="text-align:center;">
                    <th v-for="heading in headings" scope="col">{{ heading.value }}</th>
                </tr>
                </thead>
                <tbody>
                    <tr v-for="col in rows">
                        <td v-for="data in col"> {{ data.value }} </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script>
    export default{
        data () {
            return {
                headings: [],
                headingData: [],
                count: 0,
            }
        },
        created () {
            this.fetchData();
        },
        methods: {
            fetchData(){
                fetch('api/excel-data')
                    .then(res => res.json())
                    .then(res => {
                        this.headings = res.headings;
                        this.headingData = res.headingData;
                        this.count = res.headings.length;
                    })
            }
        },
        computed: {
            rows () {
                return _.chunk(_.toArray(this.headingData), this.count);
            }
        }
    }
</script>
