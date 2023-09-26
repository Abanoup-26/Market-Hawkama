<div class="col-lg-4 col-md-6 col-sm-10">
    <div class="project-item mb-30">
        <div class="project-thumb">
            <a href="#"><img src="{{ asset('frontend/img/project/project_img01.jpg') }}" alt=""></a>
            <a href="#" class="tag">الهدف ريال</a>
        </div>
        <div class="project-content">
            <h2 class="title"><a href="#">{{ $project->title }}</a>
            </h2>
            <p>التبرعات : {{ $project->title }}</p>
            <div class="progress-bar-details">
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
            </div>
            <div class="project-meta">

                <ul class="row">

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
                        <a href="{{ route('frontend.project.show', $project->id) }}"><i class="far fa-arrow-left"></i>
                            المزيد</a>
                    </li>

                </ul>
            </div>

        </div>
    </div>
</div>
