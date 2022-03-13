{{-- <div class="w-full" x-data="{course:'G11old Organic Utl'}">
    <div class="flex justify-end w-full bg-green-50">
        <select class="rounded-lg border-primary bg-blue-50" x-model="course"> --}}
            {{-- <option class="text-primary">G10 Eng Unwh</option> --}}
            {{-- <option class="text-primary">G7 Eng Unwh</option> --}}
            {{-- <option class="text-primary">G11old Organic Utl</option>
            <select />
    </div>

    <div class="overflow-hidden rounded-lg shadow-lg">
        <div x-text="course" class="px-5 py-3 valley bg-green-50"></div> --}}
        {{-- <div :class="course == 'G10 Eng Unwh' ? '' : 'hidden'">
            <canvas class="p-10" id="G10 Eng Unwh"></canvas>
        </div> --}}

        {{-- <div :class="course == 'G7 Eng Unwh' ? '' : 'hidden'">
            <canvas class="p-10" id="G7 Eng Unwh"></canvas>
        </div> --}}

        {{-- <div :class="course == 'G11old Organic Utl' ? '' : 'hidden'">
            <canvas class="p-10" id="G11old Organic Utl"></canvas>
        </div>
    </div>


    <div class="overflow-x-auto">
        <table class="w-full mt-10 table-auto">
            <thead>
                <tr class="bg-gray-100">
                    <th class="px-4 py-2">MY</th>
                    <th class="w-1/4 px-4 py-2">Y</th>
                    <th class="px-4 py-2">Students</th>
                    <th class="px-4 py-2">Income</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($g11old_organic_utl as $course)
                    <tr>
                        <td class="px-4 py-2 border">{{ $course->MY }}</td>
                        <td class="px-4 py-2 overflow-x-auto border ">{{ $course->Y }}</td>
                        <td class="px-4 py-2 border">{{ $course->students }}</td>
                        <td class="px-4 py-2 border">{{ $course->income }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script> --}}

<!-- Chart line -->
{{-- <script>
    document.addEventListener('livewire:load', function() {
        const labels =
            {!! $g10_eng_unwh_MY !!};
        const data = {
            labels: labels,
            datasets: [{
                label: 'Enrolled Students',
                backgroundColor: 'hsl(252, 82.9%, 67.8%)',
                borderColor: 'hsl(252, 82.9%, 67.8%)',
                data: {!! $g10_eng_unwh_students !!},
            }]
        };

        const configLineChart = {
            type: 'line',
            data,
            options: {}
        };

        var chartLine = new Chart(
            document.getElementById('G10 Eng Unwh'),
            configLineChart
        );
    })
</script> --}}


{{-- <script>
    document.addEventListener('livewire:load', function() {
        const labels =
            {!! $g7_eng_unwh_MY !!};
        const data = {
            labels: labels,
            datasets: [{
                label: 'Enrolled Students',
                backgroundColor: 'hsl(252, 82.9%, 67.8%)',
                borderColor: 'hsl(252, 82.9%, 67.8%)',
                data: {!! $g7_eng_unwh_students !!},
            }]
        };

        const configLineChart = {
            type: 'line',
            data,
            options: {}
        };

        var chartLine = new Chart(
            document.getElementById('G7 Eng Unwh'),
            configLineChart
        );
    })
</script> --}}

{{-- <script>
    document.addEventListener('livewire:load', function() {
        const labels =
            {!! $g11old_organic_utl_MY !!};
        const data = {
            labels: labels,
            datasets: [{
                label: 'Enrolled Students',
                backgroundColor: 'hsl(252, 82.9%, 67.8%)',
                borderColor: 'hsl(252, 82.9%, 67.8%)',
                data: {!! $g11old_organic_utl_students !!},
            }]
        };

        const configLineChart = {
            type: 'line',
            data,
            options: {}
        };

        var chartLine = new Chart(
            document.getElementById('G11old Organic Utl'),
            configLineChart
        );
    })
</script> --}}
