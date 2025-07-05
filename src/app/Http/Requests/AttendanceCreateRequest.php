<?php
//管理者用の勤怠記録の新規作成
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AttendanceCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'clock_in_time' => 'nullable|regex:/^[0-9]{1,2}:[0-9]{2}$/',
            'clock_out_time' => 'nullable|regex:/^[0-9]{1,2}:[0-9]{2}$/',
            'break1_start_time' => 'nullable|regex:/^[0-9]{1,2}:[0-9]{2}$/',
            'break1_end_time' => 'nullable|regex:/^[0-9]{1,2}:[0-9]{2}$/',
            'break2_start_time' => 'nullable|regex:/^[0-9]{1,2}:[0-9]{2}$/',
            'break2_end_time' => 'nullable|regex:/^[0-9]{1,2}:[0-9]{2}$/',
            'notes' => 'required|string|max:255',
            'user_id' => 'required|exists:users,id',
            'date' => 'required|date',
        ];
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            'clock_in_time.regex' => '出勤時間は HH:MM 形式で入力してください。',
            'clock_out_time.regex' => '退勤時間は HH:MM 形式で入力してください。',
            'break1_start_time.regex' => '休憩1開始時間は HH:MM 形式で入力してください。',
            'break1_end_time.regex' => '休憩1終了時間は HH:MM 形式で入力してください。',
            'break2_start_time.regex' => '休憩2開始時間は HH:MM 形式で入力してください。',
            'break2_end_time.regex' => '休憩2終了時間は HH:MM 形式で入力してください。',
            'notes.max' => '備考は255文字以内で入力してください。',
            'user_id.required' => 'ユーザーIDは必須です。',
            'user_id.exists' => '指定されたユーザーが存在しません。',
            'date.required' => '日付は必須です。',
            'date.date' => '有効な日付を入力してください。',
        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes(): array
    {
        return [
            'clock_in_time' => '出勤時間',
            'clock_out_time' => '退勤時間',
            'break1_start_time' => '休憩1開始時間',
            'break1_end_time' => '休憩1終了時間',
            'break2_start_time' => '休憩2開始時間',
            'break2_end_time' => '休憩2終了時間',
            'notes' => '備考',
            'user_id' => 'ユーザーID',
            'date' => '日付',
        ];
    }
}
