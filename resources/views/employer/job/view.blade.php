@extends('employer.layouts.default')

@section('content-header')
  View Job<small> </small>
@endsection

<style>
  .job-field{
    padding: 10px 0;
    background: #f6f6f6;
    margin-bottom: 5px;
    font-weight: bold;
  }
  h4 {
    text-align: center;
    padding: 15px 0;
    text-decoration: underline;
  }
  .project-add-info{
    font-family: Century Gothic,CenturyGothic,AppleGothic,sans-serif;
    font-size: 12px;
  }
</style>

@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="box box-primary">
        <div class="box-body job-view">
          <h4>Post - {{ $results->post_name }}</h4>
            <div class="row">
              <div class="col-md-6">
                <div class="col-md-12 job-field">
                  <div class="col-md-6"><i class="fa fa-gg"></i> No of Posts </div>
                  <div class="col-md-6"> {{ $results->no_of_post }}</div>
                </div>

                <div class="col-md-12 job-field">
                  <div class="col-md-6"><i class="fa fa-gg"></i> Industry </div>
                  <div class="col-md-6"> {{ $results->industry['name'] }}</div>
                </div>

                <div class="col-md-12 job-field">
                  <div class="col-md-6"><i class="fa fa-gg"></i> Place of employment state </div>
                  <div class="col-md-6"> {{ $results->state['name'] }}</div>
                </div>

                <div class="col-md-12 job-field">
                  <div class="col-md-6"><i class="fa fa-gg"></i> Place of employment district </div>
                  <div class="col-md-6"> {{ $results->district['name'] }}</div>
                </div>

                <div class="col-md-12 job-field">
                  <div class="col-md-6"><i class="fa fa-gg"></i> Place of employment city </div>
                  <div class="col-md-6"> {{ $results->place_of_employment_city }}</div>
                </div>

                <div class="col-md-12 job-field">
                  <div class="col-md-6"><i class="fa fa-gg"></i> Min Salary offered </div>
                  <div class="col-md-6"> {{ number_format($results->salary_offered_min, 2, '.', '') }}</div>
                </div>

                <div class="col-md-12 job-field">
                  <div class="col-md-6"><i class="fa fa-gg"></i> Max Salary offered </div>
                  <div class="col-md-6"> {{ number_format($results->salary_offered_max, 2, '.', '') }}</div>
                </div>

                <div class="col-md-12 job-field">
                  <div class="col-md-6"><i class="fa fa-gg"></i> Other Benifits </div>
                  <div class="col-md-6"> {{ $results->other_benefits }}</div>
                </div>

                <div class="col-md-12 job-field">
                  <div class="col-md-6"><i class="fa fa-gg"></i> Min Age preferred </div>
                  <div class="col-md-6"> {{ $results->preferred_age_min }}</div>
                </div>

                <div class="col-md-12 job-field">
                  <div class="col-md-6"><i class="fa fa-gg"></i> Max Age preferred </div>
                  <div class="col-md-6"> {{ $results->preferred_age_max }}</div>
                </div>

                <div class="col-md-12 job-field">
                  <div class="col-md-6"><i class="fa fa-gg"></i> Preferred Religion </div>
                  <div class="col-md-6"> {{ $results->preferred_relegion }}</div>
                </div>  
              </div>

              <div class="col-md-6">
                

                <div class="col-md-12 job-field">
                  <div class="col-md-6"><i class="fa fa-gg"></i> Preferred Caste </div>
                  <div class="col-md-6"> {{ $results->preferred_caste }}</div>
                </div>

                <div class="col-md-12 job-field">
                  <div class="col-md-6"><i class="fa fa-gg"></i> Preferred Sex </div>
                  <div class="col-md-6"> {{ $results->preferred_sex }}</div>
                </div>

                <div class="col-md-12 job-field">
                  <div class="col-md-6"><i class="fa fa-gg"></i> Exam Passed </div>
                  <div class="col-md-6"> {{ $results->exam['name'] }}</div>
                </div>

                <div class="col-md-12 job-field">
                  <div class="col-md-6"><i class="fa fa-gg"></i> Subject </div>
                  <div class="col-md-6"> {{ $results->subject['name'] }}</div>
                </div>

                <div class="col-md-12 job-field">
                  <div class="col-md-6"><i class="fa fa-gg"></i> Specialization </div>
                  <div class="col-md-6"> {{ $results->specialization }}</div>
                </div>

                <div class="col-md-12 job-field">
                  <div class="col-md-6"><i class="fa fa-gg"></i> Preferred Experience </div>
                  <div class="col-md-6"> {{ $results->preferred_experience }} Year(s)</div>
                </div>

                <div class="col-md-12 job-field">
                  <div class="col-md-6"><i class="fa fa-gg"></i> Ex-Serviceman </div>
                  <div class="col-md-6"> {{ $results->ex_service }}</div>
                </div>

                <div class="col-md-12 job-field">
                  <div class="col-md-6"><i class="fa fa-gg"></i> Physical Height </div>
                  <div class="col-md-6"> {{ $results->physical_height }}</div>
                </div>

                <div class="col-md-12 job-field">
                  <div class="col-md-6"><i class="fa fa-gg"></i> Physical Weight </div>
                  <div class="col-md-6"> {{ $results->physical_weight }}</div>
                </div>

                <div class="col-md-12 job-field">
                  <div class="col-md-6"><i class="fa fa-gg"></i> Chest </div>
                  <div class="col-md-6"> {{ $results->physical_chest }}</div>
                </div>

                <div class="col-md-12 job-field">
                  <div class="col-md-6"><i class="fa fa-gg"></i> Physically Challenged </div>
                  <div class="col-md-6"> {{ $results->physical_challenge }}</div>
                </div>

                <div class="col-md-12 job-field">
                  <div class="col-md-6"><i class="fa fa-gg"></i> Job Type </div>
                  <div class="col-md-6"> {{ $results->job_type }}</div>
                </div>
              </div>
              @if($results->description != ''):
              <div class="col-md-10 col-md-offset-1">
                {!! $results->description !!}
              </div>
              @endif
            </div>

            <div class="row">
              <div class="col-md-6 project-add-info col-md-offset-3">
                <a href="{{ route('employer.list_job')}}" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-chevron-left"></span> BACK</a>
                <a href="{{route('employer.edit_job', $results->id) }}" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-edit"></span> EDIT</a>
              </div>
            </div>

            <div class="row" style="margin-top:20px">
              <div class="col-md-8 project-add-info col-md-offset-2">
                <i class="fa fa-bullseye"></i>Job Status {!! $results->status ? '<span class="btn btn-success btn-xs">Enabled</span>' : '<span class="btn btn-danger btn-xs">Disabled</span>' !!} | <i class="fa fa-calendar-check-o"></i>Job created at <strong>{{ date('d-m-Y h:i A', strtotime($results->created_at)) }}</strong> | <i class="fa fa-get-pocket"></i>Employer <strong>{{ $results->employer['organization_name'] }} </strong>
              </div>
            </div>

        </div>

	</div>
</div>
</div>
@stop