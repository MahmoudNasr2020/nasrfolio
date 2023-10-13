<!--   Skills Start   -->
@if($data['skills']->count() > 0)
<div class="skills-01">
    <div class="row mt-0 mt-lg-3">
        <div class="col-lg-12">
            <h2 class="base-color">مهاراتي</h2>
            <h4>هنا استعرض المهارات الخاصة بي</h4>
        </div>
        <div class="col-lg-12 mt-4">
            <div id="skills">
                <div class="container">
                    <div class="row">
                        @foreach($data['skills'] as $skill)
                            <div class="col-lg-4 skill-box">
                                <div class="skillbar clearfix" data-percent="{{ $skill->percent }}%">
                                    <div class="skillbar-title"><span>{{ $skill->name }}</span></div>
                                    <div class="skillbar-bar"></div>
                                    <div class="skill-bar-percent">
                                        {{ $skill->percent }}%
                                        <div class="arrow"></div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endif
<!--    Skills End    -->
