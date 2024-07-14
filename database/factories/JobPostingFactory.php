<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\JobPosting>
 */
class JobPostingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => 'Tuyển nhân viên Chính thức',
            'description' => 'Chuyên viên SEO phân tích từ khóa để hiểu xu hướng tìm kiếm của người dùng và tạo ra chiến lược nội dung phù hợp. Họ cũng tối ưu hóa trang web từ góc độ kỹ thuật, bao gồm cải thiện tốc độ tải trang, cấu trúc URL, sitemap và nhiều yếu tố khác để cải thiện trải nghiệm người dùng và thu hút các công cụ tìm kiếm.
            Ngoài ra, việc xây dựng liên kết (backlink) là một phần quan trọng của công việc SEO. Chuyên viên SEO tìm kiếm cơ hội xây dựng liên kết từ các trang web uy tín và phù hợp với lĩnh vực của họ để tăng cường sức mạnh của trang web trong việc đánh giá của các công cụ tìm kiếm.',
            'request' => 'Có kiến thức vững về các nguyên tắc SEO, bao gồm SEO on-page và off-page, từ khóa, backlink, cấu trúc URL, markup schema, robots.txt, sitemap, v.v.
            Cập nhật kiến thức với các thay đổi và xu hướng mới trong SEO. ',
            'salary' => fake()->numberBetween(1000000, 20000000),
            'benefit' =>'Cung cấp bảo hiểm sức khỏe cho nhân viên và gia đình. Đảm bảo bảo vệ khi có tai nạn liên quan đến công việc. Cung cấp số ngày nghỉ phép hàng năm để nhân viên có thể nghỉ ngơi, đi du lịch hoặc chăm sóc sức khỏe.',
            'working_time' => fake()->text(20),
            'address' => 'Mê Linh, Mê Linh, Hà Nội',
            'application_deadline' => fake()->date,
            'contact' => fake()->text(40),
            'status' => fake()->numberBetween(0, 1),
            'job_position_id' => fake()->numberBetween(1, 10),
            'user_id' => fake()->numberBetween(1, 10),
        ];
    }
}
