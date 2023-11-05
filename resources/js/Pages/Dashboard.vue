<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue';
import { Head, Link } from '@inertiajs/vue3';

import Table from '@/Components/Table.vue';
import TableRow from '@/Components/TableRow.vue';
import TableHeaderCell from '@/Components/TableHeaderCell.vue';
import TableDataCell from '@/Components/TableDataCell.vue';

import { Bar } from 'vue-chartjs'
import { Pie } from 'vue-chartjs'
import { Line } from 'vue-chartjs'

import { Chart as ChartJS, Title, Tooltip, Legend, BarElement, CategoryScale, LinearScale, ArcElement, PointElement, LineElement } from 'chart.js'

ChartJS.register(Title, Tooltip, Legend, BarElement, CategoryScale, LinearScale, ArcElement, PointElement, LineElement)
var usersData = defineProps(['usersCountMale', 'usersCountFemale', 'usersCountOthers']);
var male =  null
console.log(usersData.usersCountMale)
</script>
<script>
export default {
  name: 'BarChart',
  ddt:10,
  components: { Bar },
  data() {
    return {
      chartData: {
        labels: [ 'January', 'February', 'March' ],
        datasets: [ 
            { 
                backgroundColor: ['#003f5c', '#2f4b7c', '#665191'],
                data: [this.usersCountMale,this.usersCountFemale,this.usersCountOthers] 
            } 
        ]
      },
      chartOptions: {
        responsive: true
      }
    }
  }
}

export const pieData = {
  labels: ['Semester 1', 'Semester 2', 'Semester 3', 'Semester 4', 'Semester 5', 'Semester 6', 'Semester 7', 'Semester 8'],
  datasets: [
    {
      backgroundColor: ['#003f5c', '#2f4b7c', '#665191', '#a05195', '#d45087', '#f95d6a', '#ff7c43', '#ffa600'],
      data: [40, 20, 80, 10, 15, 70, 20, 35]
    }
  ]
}

export const pieOptions = {
  responsive: true,
}

export const lineData = {
  labels: ['VueJs', 'EmberJs', 'ReactJs', 'AngularJs'],
  datasets: [
    {
      backgroundColor: ['#003f5c', '#2f4b7c', '#665191', '#a05195'],
      data: [40, 20, 80, 10]
    }
  ]
}

export const lineOptions = {
  responsive: true,
}

</script>
<template>
    <Head title="Dashboard" />

    <AdminLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Dashboard</h2>
        </template>

        <div class="max-w-7xl mx-auto py-4">
            <div class="flex justify-between">
                <h1>Dashboard </h1>
                
           </div>
           <div class="mt-6">
              
           </div>
        </div>
         <div class="px-6 pt-6 2xl:container">
             
        <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
            <div class="md:col-span-2 lg:col-span-1" >
                <div class="h-full py-8 px-6 space-y-6 rounded-xl border border-gray-200 bg-white">
                   <Bar
                        id="my-chart-id"
                        :options="chartOptions"
                        :data="chartData"
                    />
                    <div>
                        <h5 class="text-xl text-gray-600 text-center">Global Activities</h5>
                        <div class="mt-2 flex justify-center gap-4">
                            <h3 class="text-3xl font-bold text-gray-700">$23,988</h3>
                            <div class="flex items-end gap-1 text-green-500">
                                <svg class="w-3" viewBox="0 0 12 15" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M6.00001 0L12 8H-3.05176e-05L6.00001 0Z" fill="currentColor"/>
                                </svg>
                                <span>2%</span>
                            </div>
                        </div>
                        <span class="block text-center text-gray-500">Compared to last week $13,988</span>
                    </div>
                </div>
            </div>
            <div>
                <div class="h-full py-6 px-6 rounded-xl border border-gray-200 bg-white">
                    <h5 class="text-xl text-gray-700">Downloads</h5>
                   <Pie
                        id="my-chart-id"
                        :options="pieOptions"
                        :data="pieData"
                    />
                  
                </div>
            </div>
            <div>
                <div class="lg:h-full py-8 px-6 text-gray-600 rounded-xl border border-gray-200 bg-white">
                 
                    <Line
                        id="my-chart-id"
                        :options="lineOptions"
                        :data="lineData"
                    />
                   
                             
                </div>
            </div>
        </div>
    </div>
    
    </AdminLayout>
</template>
