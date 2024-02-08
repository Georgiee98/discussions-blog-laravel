@component('mail::message')
# Hello!

Thank you for showing interest in our academy.

We're thrilled to have you on board and can't wait to help you explore our courses and advance your skills. Our academy
is dedicated to providing top-notch learning experiences and resources to fuel your passion for knowledge.

@component('mail::button', ['url' => 'https://http://localhost:8000/'])
Explore Courses
@endcomponent

If you have any questions or need guidance, feel free to reach out. We're here to support your learning journey every
step of the way.

Thanks again for choosing us. We look forward to being a part of your educational journey.

Warm regards,<br>
{{ config('app.name') }}
@endcomponent