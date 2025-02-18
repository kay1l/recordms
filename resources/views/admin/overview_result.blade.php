@extends('admin.master')
@section('content')
<style>
          .name {
            width: 200px;
            display: block;
          
        }
</style>
<nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
      <li class="breadcrumb-item"><a href="{{route('admin.overview')}}">Select Year</a></li>
      <li class="breadcrumb-item active" aria-current="page">Activities Overview</li>
    </ol>
  </nav>
    <div class="ibox">
        <div class="ibox-head">
            <div class="ibox-title"><h2><b>Activity Overview (by Year)</b></h2></div>

            <div class="form-group-sm text-right">
                <a href="{{route('summary.pdf', ['year' => $selectedYear]) }}" class="btn btn-primary btn-rounded" 
                    data-target="#exampleModalCenter"> 
                    <i class="fa fa-download"></i> Generate Report
                </a>
            </div>
        </div>
     
        <div class="ibox-body">
            <div class="table-responsive" style="overflow-x: auto;">
            <table class="  table table-bordered table-hover " id="overview" cellspacing="0" width="100%" >
                <thead>
                    <tr>
                        <th>Activity Code</th>
                            <th>Activity Name</th>
                            <th>Implementation Period</th>
                            {{-- <th>Date End</th> --}}
                            <th>Quarter</th>
                            <th>College</th>
                            <th>Department</th>
                            <th>Proponents</th>
                            <th>College(s)/ Agency Involved</th>
                            <th>Year</th>
                            <th>Budget (Php)</th>
                            <th>Remarks</th>
                    
                    </tr>
                </thead>
                <tbody class="table-content" >
                    @foreach ($overview as $activity)
                        <tr>
                            <td><span class="badge badge-success m-r-5 m-b-5">{{ $activity->activity_code }}</span>
                            </td>
                            <td class="name">{{ $activity->activity_name }}</td>
                            <td><span
                                    class="badge badge-default m-r-5 m-b-5">{{ $activity->start->format('M Y') . ' - ' . $activity->end->format('M Y')  }}</span>
                            </td>
                        </td>
                      
                            <td>
                                @if ($activity->quarter == '1')
                                <span>1st Quarter</span>
                            @elseif ($activity->quarter == '2')
                            <span>2nd Quarter</span>
                            @elseif ($activity->quarter == '3')
                            <span>3rd Quarter</span>
                            @elseif ($activity->quarter == '4')
                            <span>4th Quarter</span>
                            @endif
                            </td>
                            <td>
                                @php
                                    $collegeCode = $activity->collegeCode;
                                    $college = App\Models\College::where('collegeCode', $collegeCode)->first();
                                    $collegeName = $college ? $college->collegeName : 'Unknown College';
                                    echo $collegeName;
                                @endphp
                            </td>
                            
                            <td>
                                @php
                                    $programId = $activity->proponentId;
                                    $program = App\Models\Program::where('programId', $programId)->first();
                                    $programName = $program ? $program->programName : 'Unknown Program';
                                    echo $programName;
                                @endphp
                            </td>
                            <td>
                                @foreach (explode(',', $activity->proponents) as $prop)
                                    <span class="badge badge-default m-r-5 m-b-5">{{ trim($prop) }}</span>
                                    @if (!$loop->last)
                                        <span><b> </b></span> <!-- Add a comma except for the last item -->
                                    @endif
                                @endforeach
                            </td>

                            <td>
                                @foreach (explode(',', $activity->proponent) as $proponent)
                                    <span class="badge badge-default m-r-5 m-b-5">{{ trim($proponent) }}</span>
                                    @if (!$loop->last)
                                        <span><b> </b></span> <!-- Add a comma except for the last item -->
                                    @endif
                                @endforeach
                            </td>

                            <td><span class="badge badge-info m-r-5 m-b-5">{{ $activity->year }}</span></td>
                            <td><span class="badge badge-secondary m-r-5 m-b-5">₱{{ $activity->budget }}</span></td>
                            <td>{{ $activity->status }}</td>
                          
                        </tr>
                    @endforeach
               
                </tbody>
            </table>
        </div>
        </div>
    </div>
@endsection