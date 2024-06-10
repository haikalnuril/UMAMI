import random
import hashlib
from faker import Faker

fake = Faker()

# Fungsi untuk menghasilkan data acak
def generate_dummy_data(start_id, num_records):
    data = []
    for i in range(num_records):
        record_id = start_id + i
        name = fake.user_name()
        password = fake.password(length=8, special_chars=True, digits=True, upper_case=True, lower_case=True)
        hashed_password = hashlib.sha256(password.encode()).hexdigest()
        email = fake.email()
        role = random.choice(['3', '2'])
        created_at = fake.date_time_this_year().strftime('%Y-%m-%d %H:%M:%S')
        data.append((record_id, name, hashed_password, email, role, created_at))
    return data

# Generate 100 dummy data records
dummy_data = generate_dummy_data(6, 20)  # Starting from id 3

# Print the SQL INSERT statements
for record in dummy_data:
    print(f"({record[0]}, '{record[1]}', '{record[2]}', '{record[3]}', {record[4]}, '{record[5]}', '{record[5]}'),")