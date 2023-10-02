@php
    $project_image = isset($project->image[0]) ? $project->image[0]->getUrl('preview') : asset('frontend/img/project/project_img01.jpg');
@endphp
<div class="col">
    <div class="project-item mb-30">
        <div class="project-thumb">

            <a href="#"><img src="{{ $project_image }}" alt=""></a>
            <a href="#" class="tag">الهدف ريال</a>
        </div>
        <div class="project-content">
            <h2 class="title"><a href="#">{{ $project->title }}</a>
            </h2>
            <p>التبرعات : {{ $project->title }}</p>
            <div class="progress-bar-details">
                @if ($project->collected == $project->goal)
                    <div class="container">
                        <img class="w-50" src="{{ asset('frontend/img/checked.png') }}" alt="">
                        <div class="row justify-content-center fw-bold fs-3"> تم الانتهاء من المشروع
                        </div>
                    </div>
                @else
                    <!-- Progress bar -->
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" style="width: {{ $project->rate_percentage }}%;"
                            aria-valuenow="{{ $project->rate_percentage }}" aria-valuemin="0" aria-valuemax="100">
                            {{ $project->rate_percentage }}%
                        </div>
                    </div>
                    <div class="cause-amounts row">
                        <!-- Goal -->
                        <div class="col-6">
                            <span>{{ $project->goal }} ريال </span>
                            <p>المستهدف</p>
                        </div>
                        <!-- Collected -->
                        <div class="col-6">
                            <span>{{ $project->collected }} ريال</span>
                            <p>تم جمع</p>
                        </div>
                    </div>
                @endif
            </div>
            <div class="project-meta">

                <ul class="row">
                    @if ($project->collected == $project->goal)
                        <li class="col-12">
                            <a href="{{ route('frontend.project.show', $project->id) }}"><i
                                    class="far fa-arrow-left"></i>
                                المزيد</a>
                        </li>
                    @else
                        <form action="{{ route('frontend.cart.add', $project->id) }}" method="POST">
                            @csrf
                            <li class="col-6">
                                <input class="form-control {{ $errors->has('donation_amount') ? 'is-invalid' : '' }}"
                                    type="number" name="donation_amount" id="donation_amount"
                                    value="{{ old('donation_amount', '') }}" placeholder="مبلغ التبرع" required
                                    min="0" pattern="\d*">

                            </li>
                            <li class="col-6">
                                <button style="border:inherit; background: inherit; color:black; font-weight: 600"
                                    type="submit"><i class="far fa-hands"></i> تبرع
                                    الان</button>

                            </li>
                        </form>
                        <li class="col-6"> <!-- Use col-6 for 2 items per row -->
                            <a href="{{ route('frontend.cart.add', $project->id) }}">
                                <i class="fas fa-shopping-cart"></i> اضف الى التبرعات
                            </a>
                        </li>
                        <li class="col-6"> <!-- Use col-6 for 2 items per row -->
                            <a href="{{ route('frontend.project.show', $project->id) }}"><i
                                    class="far fa-arrow-left"></i>
                                المزيد</a>
                        </li>
                    @endif

                </ul>
            </div>

        </div>
    </div>
</div>
