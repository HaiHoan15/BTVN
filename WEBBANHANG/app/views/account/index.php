<?php include 'app/views/shares/header.php'; ?>

<style>
    body {
        background: url('/webbanhang/public/images/background/account-background.avif') no-repeat center center fixed;
        background-size: cover;
        min-height: 100vh;
    }

    /* Tiêu đề */
    .page-title {
        font-size: 42px;
        font-weight: 800;
        background: linear-gradient(135deg, #facc15 0%, #fbbf24 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        letter-spacing: 1px;
        text-transform: uppercase;
        position: relative;
        padding-bottom: 15px;
        margin-bottom: 35px;
    }

    .page-title::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        height: 3px;
        background: linear-gradient(90deg, #facc15, #fbbf24, transparent);
        border-radius: 2px;
    }

    /* Container */
    .profile-container {
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(10px);
        border-radius: 20px;
        padding: 40px;
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.15);
        margin-bottom: 40px;
    }

    /* Avatar section */
    .avatar-section {
        text-align: center;
        padding: 30px;
        background: linear-gradient(135deg, #f9fafb 0%, #f3f4f6 100%);
        border-radius: 16px;
        border: 2px solid #e5e7eb;
        margin-bottom: 30px;
    }

    .avatar-image {
        width: 180px;
        height: 180px;
        border-radius: 50%;
        object-fit: cover;
        margin-bottom: 20px;
        border: 5px solid white;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
        transition: transform 0.3s ease;
    }

    .avatar-image:hover {
        transform: scale(1.05);
    }

    .avatar-label {
        display: block;
        font-weight: 700;
        color: #374151;
        margin-bottom: 12px;
        font-size: 14px;
        text-transform: uppercase;
    }

    .avatar-input {
        display: block;
        width: 100%;
        padding: 12px;
        border: 2px dashed #3b82f6;
        border-radius: 10px;
        background: white;
        cursor: pointer;
        font-size: 13px;
        color: #6b7280;
        transition: all 0.3s ease;
    }

    .avatar-input:hover {
        border-color: #2563eb;
        background: #f0f9ff;
    }

    .avatar-input::file-selector-button {
        background: linear-gradient(135deg, #3b82f6, #2563eb);
        color: white;
        padding: 8px 16px;
        border: none;
        border-radius: 6px;
        font-weight: 700;
        cursor: pointer;
        margin-right: 10px;
    }

    /* Form section */
    .form-section {
        margin-bottom: 35px;
        padding-bottom: 25px;
        border-bottom: 2px solid #f3f4f6;
    }

    .form-section:last-of-type {
        border-bottom: none;
    }

    .section-title {
        font-size: 16px;
        font-weight: 700;
        color: #111827;
        text-transform: uppercase;
        letter-spacing: 0.8px;
        margin-bottom: 20px;
        padding-bottom: 12px;
        border-bottom: 2px solid #dbeafe;
    }

    /* Form group */
    .form-group {
        margin-bottom: 20px;
    }

    .form-group label {
        display: block;
        font-weight: 600;
        color: #374151;
        margin-bottom: 8px;
        font-size: 14px;
    }

    /* Input styling */
    .form-control {
        background: white !important;
        border: 2px solid #e5e7eb !important;
        border-radius: 10px !important;
        padding: 12px 16px !important;
        font-size: 14px !important;
        color: #111827 !important;
        transition: all 0.3s ease !important;
    }

    .form-control:focus {
        border-color: #3b82f6 !important;
        box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1) !important;
    }

    .form-control:disabled,
    .form-control[readonly] {
        background: #f9fafb !important;
        color: #6b7280 !important;
        cursor: not-allowed;
    }

    /* Form layout grid */
    .form-row-2 {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 20px;
    }

    /* Divider */
    .divider {
        margin: 30px 0;
        height: 2px;
        background: linear-gradient(90deg, #f3f4f6, #dbeafe, #f3f4f6);
        border: none;
    }

    /* Button container */
    .button-group {
        display: flex;
        gap: 15px;
        margin-top: 30px;
    }

    /* Submit button */
    .btn-submit {
        flex: 1;
        background: linear-gradient(135deg, #3b82f6, #2563eb);
        color: white;
        padding: 14px 32px;
        border: none;
        border-radius: 10px;
        font-weight: 700;
        font-size: 15px;
        cursor: pointer;
        transition: all 0.3s ease;
        text-decoration: none;
    }

    .btn-submit:hover {
        transform: translateY(-3px);
        box-shadow: 0 12px 24px rgba(59, 130, 246, 0.3);
    }

    .btn-submit:active {
        transform: translateY(-1px);
    }

    /* Back button */
    .btn-back {
        background: #f3f4f6;
        color: #374151;
        padding: 14px 32px;
        border: 2px solid #e5e7eb;
        border-radius: 10px;
        font-weight: 700;
        font-size: 15px;
        cursor: pointer;
        transition: all 0.3s ease;
        text-decoration: none;
        display: inline-block;
    }

    .btn-back:hover {
        background: #e5e7eb;
        border-color: #d1d5db;
        transform: translateY(-3px);
        color: #374151;
        text-decoration: none;
    }

    .btn-back:active {
        transform: translateY(-1px);
    }

    /* Info box */
    .info-box {
        background: #e0e7ff;
        border-left: 4px solid #4f46e5;
        border-radius: 8px;
        padding: 16px;
        margin-bottom: 25px;
        color: #3730a3;
        font-size: 14px;
        font-weight: 500;
    }

    /* Modal Popup Styles */
    .modal-overlay {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(0, 0, 0, 0.5);
        z-index: 1000;
        animation: fadeIn 0.3s ease;
    }

    .modal-overlay.active {
        display: flex;
        align-items: center;
        justify-content: center;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
        }

        to {
            opacity: 1;
        }
    }

    .modal-content {
        background: white;
        border-radius: 16px;
        padding: 30px;
        max-width: 500px;
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
        animation: slideUp 0.3s ease;
    }

    @keyframes slideUp {
        from {
            transform: translateY(20px);
            opacity: 0;
        }

        to {
            transform: translateY(0);
            opacity: 1;
        }
    }

    .modal-icon {
        font-size: 48px;
        margin-bottom: 16px;
    }

    .modal-title {
        font-size: 18px;
        font-weight: 800;
        color: #111827;
        margin-bottom: 12px;
    }

    .modal-message {
        font-size: 14px;
        color: #6b7280;
        margin-bottom: 12px;
        line-height: 1.6;
    }

    .modal-errors {
        background: #fef2f2;
        border: 1px solid #fecaca;
        border-radius: 8px;
        padding: 12px;
        margin-bottom: 20px;
    }

    .modal-error-item {
        font-size: 13px;
        color: #991b1b;
        margin-bottom: 8px;
        padding-left: 20px;
        position: relative;
        font-weight: 500;
    }

    .modal-error-item:last-child {
        margin-bottom: 0;
    }

    .modal-error-item::before {
        content: '•';
        position: absolute;
        left: 8px;
        font-weight: bold;
    }

    .modal-button {
        width: 100%;
        padding: 12px 24px;
        background: linear-gradient(135deg, #3b82f6, #2563eb);
        color: white;
        border: none;
        border-radius: 8px;
        font-weight: 700;
        font-size: 14px;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .modal-button:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 16px rgba(59, 130, 246, 0.3);
    }

    .modal-button.success {
        background: linear-gradient(135deg, #10b981, #059669);
    }

    .modal-button.success:hover {
        box-shadow: 0 8px 16px rgba(16, 185, 129, 0.3);
    }

    .modal-button.error {
        background: linear-gradient(135deg, #ef4444, #dc2626);
    }

    .modal-button.error:hover {
        box-shadow: 0 8px 16px rgba(239, 68, 68, 0.3);
    }

    /* Responsive */
    @media (max-width: 768px) {
        .profile-container {
            padding: 25px;
        }

        .page-title {
            font-size: 28px;
        }

        .avatar-section {
            padding: 20px;
            margin-bottom: 25px;
        }

        .avatar-image {
            width: 150px;
            height: 150px;
        }

        .form-row-2 {
            grid-template-columns: 1fr;
        }

        .button-group {
            flex-direction: column;
        }

        .btn-submit,
        .btn-back {
            width: 100%;
        }

        .section-title {
            font-size: 14px;
        }

        .modal-content {
            max-width: 90%;
            padding: 24px;
        }
    }

    @media (max-width: 480px) {
        .profile-container {
            padding: 20px;
        }

        .page-title {
            font-size: 24px;
            margin-bottom: 25px;
        }

        .avatar-image {
            width: 120px;
            height: 120px;
        }

        .form-group {
            margin-bottom: 16px;
        }

        .form-control {
            padding: 10px 12px !important;
            font-size: 13px !important;
        }

        .modal-content {
            max-width: 95%;
            padding: 20px;
        }

        .modal-title {
            font-size: 16px;
        }

        .modal-message {
            font-size: 13px;
        }
    }
</style>

<div class="profile-container">
    <h1 class="page-title">Thông Tin Tài Khoản</h1>

    <form method="POST" enctype="multipart/form-data" id="profileForm">

        <!-- Avatar section -->
        <div class="avatar-section">
            <?php
            if ($account->avatar) {
                $image = 'data:image/jpeg;base64,' . base64_encode($account->avatar);
            } else {
                $image = '/webbanhang/public/images/error/user-error-image.png';
            }
            ?>

            <img src="<?php echo $image; ?>" class="avatar-image" id="avatarPreview" alt="Avatar">

            <label class="avatar-label">Ảnh đại diện</label>
            <input type="file" name="avatar" id="avatarInput" class="avatar-input" accept="image/*">
            <small class="text-muted d-block mt-2">Chấp nhận: JPG, PNG (Tối đa 5MB)</small>
        </div>

        <!-- Thông tin cá nhân -->
        <div class="form-section">
            <div class="section-title">Thông tin cá nhân</div>

            <div class="form-row-2">
                <div class="form-group">
                    <label class="form-label">Tên tài khoản</label>
                    <input type="text" name="username" id="username" class="form-control"
                        value="<?php echo htmlspecialchars($account->username); ?>" required>
                </div>

                <div class="form-group">
                    <label class="form-label">Email</label>
                    <input type="email" class="form-control" value="<?php echo htmlspecialchars($account->email); ?>"
                        readonly>
                </div>
            </div>

            <div class="form-row-2">
                <div class="form-group">
                    <label class="form-label">Số điện thoại</label>
                    <input type="text" name="phone" id="phone" class="form-control"
                        value="<?php echo htmlspecialchars($account->phone); ?>" placeholder="Nhập số điện thoại">
                </div>

                <div class="form-group">
                    <label class="form-label">Địa chỉ</label>
                    <input type="text" name="address" id="address" class="form-control"
                        value="<?php echo htmlspecialchars($account->address); ?>" placeholder="Nhập địa chỉ">
                </div>
            </div>
        </div>

        <!-- Đổi mật khẩu -->
        <div class="form-section">
            <div class="section-title">Đổi Mật Khẩu</div>

            <div class="info-box">
                Để bảo mật tài khoản, vui lòng sử dụng mật khẩu mạnh (Tối thiểu 8 ký tự)
            </div>

            <div class="form-row-2">
                <div class="form-group">
                    <label class="form-label">Mật khẩu mới</label>
                    <input type="password" name="password" id="password" class="form-control"
                        placeholder="Để trống nếu không đổi">
                </div>

                <div class="form-group">
                    <label class="form-label">Xác nhận mật khẩu</label>
                    <input type="password" name="confirm_password" id="confirm_password" class="form-control"
                        placeholder="Nhập lại mật khẩu mới">
                </div>
            </div>
        </div>

        <!-- Buttons -->
        <div class="button-group">
            <a href="/webbanhang/" class="btn-back">
                Quay lại
            </a>

            <button type="submit" class="btn-submit">
                Cập nhật thông tin
            </button>
        </div>

    </form>
</div>

<!-- Modal Popup -->
<div class="modal-overlay" id="modalOverlay">
    <div class="modal-content">
        <div class="modal-icon" id="modalIcon"></div>
        <div class="modal-title" id="modalTitle"></div>
        <div class="modal-message" id="modalMessage"></div>
        <div class="modal-errors" id="modalErrors" style="display: none;"></div>
        <button class="modal-button" id="modalButton" onclick="closeModal()">Đóng</button>
    </div>
</div>

<script>
    // Preview ảnh khi chọn
    document.getElementById('avatarInput').addEventListener('change', function (event) {
        const file = event.target.files[0];
        const errors = [];

        if (file) {
            // Kiểm tra kích thước file (5MB)
            if (file.size > 5 * 1024 * 1024) {
                errors.push('File quá lớn! Vui lòng chọn ảnh dưới 5MB');
            }

            // Kiểm tra định dạng file
            if (!file.type.startsWith('image/')) {
                errors.push('Vui lòng chọn file ảnh (JPG, PNG)');
            }

            if (errors.length > 0) {
                showModal('Lỗi chọn ảnh', 'Vui lòng kiểm tra lại:', '❌', 'error', errors);
                this.value = '';
                return;
            }

            const reader = new FileReader();
            reader.onload = function (e) {
                document.getElementById('avatarPreview').src = e.target.result;
            };
            reader.readAsDataURL(file);
        }
    });

    // Xử lý submit form
    document.getElementById('profileForm').addEventListener('submit', async function (e) {
        e.preventDefault();

        const errors = [];

        // Kiểm tra tên tài khoản
        const username = document.getElementById('username').value.trim();
        if (!username) {
            errors.push('Tên tài khoản không được để trống');
        }

        //kiểm tra tên tài khoản có bị trùng không
        const currentUsername = "<?php echo htmlspecialchars($account->username); ?>";

        if (username && username !== currentUsername) {
            const response = await fetch('/webbanhang/Account/checkUsername?username=' + encodeURIComponent(username));
            const data = await response.json();

            if (data.exists) {
                errors.push('Tên tài khoản đã tồn tại. Vui lòng chọn tên khác');
            }
        }

        // Kiểm tra mật khẩu
        const password = document.getElementById('password').value;
        const confirmPassword = document.getElementById('confirm_password').value;

        if (password || confirmPassword) {
            if (password.length < 8) {
                errors.push('Mật khẩu phải có ít nhất 8 ký tự');
            }

            if (password !== confirmPassword) {
                errors.push('Mật khẩu xác nhận không khớp');
            }

            if (!password) {
                errors.push('Vui lòng nhập mật khẩu mới');
            }

            if (!confirmPassword) {
                errors.push('Vui lòng xác nhận mật khẩu');
            }
        }

        if (errors.length > 0) {
            showModal('Có lỗi cần sửa', 'Vui lòng kiểm tra lại các trường sau:', '❌', 'error', errors);
            return;
        }

        // Gửi form qua AJAX
        const formData = new FormData(this);

        fetch(this.action || window.location.href, {
            method: 'POST',
            body: formData
        })
            .then(response => response.text())
            .then(data => {
                // Kiểm tra thông báo từ server
                if (data.includes('success') || data.includes('thành công')) {
                    showModal('Thành công', 'Cập nhật thông tin thành công! Trang sẽ tải lại trong giây lát...', '✓', 'success');
                    setTimeout(() => {
                        window.location.reload();
                    }, 2000);
                } else {
                    showModal('Lỗi', 'Cập nhật thất bại. Vui lòng thử lại!', '❌', 'error', ['Có lỗi từ server']);
                }
            })
            .catch(error => {
                showModal('Lỗi kết nối', 'Không thể kết nối đến server. Vui lòng thử lại!', '❌', 'error', ['Lỗi mạng']);
                console.error('Error:', error);
            });
    });

    // Hàm hiển thị modal
    function showModal(title, message, icon, type = 'success', errors = []) {
        document.getElementById('modalTitle').textContent = title;
        document.getElementById('modalMessage').textContent = message;
        document.getElementById('modalIcon').textContent = icon;

        const button = document.getElementById('modalButton');
        button.className = 'modal-button ' + type;

        // Hiển thị danh sách lỗi nếu có
        const errorContainer = document.getElementById('modalErrors');
        if (errors.length > 0) {
            let errorHTML = '';
            errors.forEach(error => {
                errorHTML += `<div class="modal-error-item">${error}</div>`;
            });
            errorContainer.innerHTML = errorHTML;
            errorContainer.style.display = 'block';
        } else {
            errorContainer.style.display = 'none';
        }

        document.getElementById('modalOverlay').classList.add('active');
    }

    // Hàm đóng modal
    function closeModal() {
        document.getElementById('modalOverlay').classList.remove('active');
    }

    // Đóng modal khi click ngoài
    document.getElementById('modalOverlay').addEventListener('click', function (e) {
        if (e.target === this) {
            closeModal();
        }
    });
</script>

<?php include 'app/views/shares/footer.php'; ?>