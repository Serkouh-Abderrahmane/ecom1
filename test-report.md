# Luôn Vui Tươi - QA Test Report

**Date:** 2026-06-19 16:06:57
**Server:** http://localhost:8080
**Result:** ⚠️ 1 failures

## Summary

| Result | Count |
|--------|-------|
| PASS   | 17 |
| FAIL   | 1 |
| Total  | 18 |
| Rate   | 94.4% |

## Test Details

| # | Test | Status | Detail |
|---|------|--------|--------|
| 1 | 1. Homepage loads (200 OK) | ✅ PASS |  |
| 2 | 2. Vietnamese language detected | ✅ PASS |  |
| 3 | 3. Header has all 8 categories | ✅ PASS |  |
| 4 | 4. Footer has contact info | ✅ PASS |  |
| 5 | 5. No PHP warnings/notices | ✅ PASS |  |
| 6 | 6. Login page renders in Vietnamese | ✅ PASS |  |
| 7 | 7. Register page renders in Vietnamese | ✅ PASS |  |
| 8 | 8. Cart page renders in Vietnamese | ✅ PASS |  |
| 9 | 9. Checkout page accessible | ✅ PASS |  |
| 10 | 10. Products visible on homepage | ✅ PASS |  |
| 11 | 11. Categories have items | ✅ PASS |  |
| 12 | 12. Register a new user | ✅ PASS |  |
| 13 | 13. Admin login accessible | ✅ PASS |  |
| 14 | 14. Contacts page in Vietnamese | ✅ PASS |  |
| 15 | 15. Footer shows Luôn Vui Tươi brand | ✅ PASS |  |
| 16 | 16. All product URLs return 200 | ✅ PASS |  |
| 17 | 17. No broken internal links | ✅ PASS |  |
| 18 | 18. Product images load (no broken images) | ❌ FAIL | Broken images: http://ecom1-production-5a8d.up.railway.app/attachments/lang_flags/bg.jpg, http://ecom1-production-5a8d.up.railway.app/attachments/lang_flags/en.jpg, http://ecom1-production-5a8d.up.railway.app/attachments/lang_flags/gr.png, http://ecom1-production-5a8d.up.railway.app/attachments/lang_flags/id.jpg, http://ecom1-production-5a8d.up.railway.app/attachments/lang_flags/fr.jpg |
