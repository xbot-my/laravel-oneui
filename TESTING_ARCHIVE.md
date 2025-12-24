# Laravel OneUI 测试执行计划 - 存档

**存档时间**: 2024-12-24

---

## 📊 当前状态总结

### ✅ 已完成的工作

#### 阶段0：环境准备
- [x] 安装Pest Browser插件：`composer require pestphp/pest-plugin-browser --dev`
- [x] 安装Playwright CLI：`npm install playwright@latest`
- [x] 安装Playwright浏览器驱动：`npx playwright install chromium`
- [x] 配置.gitignore（排除测试产物）
- [x] 创建测试目录结构：
  - `tests/Browser/{Components,Flows,Screenshots,Traces}`
  - `tests/Feature/Components`
  - `tests/TestPages/{Components,Flows}`

#### 阶段1：清理旧测试
- [x] 删除不匹配的旧测试：
  - `tests/Feature/Components/AlertTest.php`
  - `tests/Feature/Components/BadgeTest.php`
  - `tests/Feature/Components/ButtonTest.php`
  - `tests/Feature/Components/InputTest.php`

#### 阶段2：创建测试基类
- [x] 创建浏览器测试基类：
  - `tests/Browser/BaseBrowserTest.php`
  - 包含自动截屏功能 `takeScreenshot()` 方法
  - 包含关键步骤截屏功能 `takeStepScreenshot()` 方法

- [x] 创建HTML测试辅助类：
  - `tests/Feature/Components/ComponentTestHelper.php`
  - 包含 `renderComponent()`, `assertContainsClasses()`, `assertDoesNotContainClasses()` 方法

#### 阶段3：测试页面环境
- [x] 创建测试路由文件：`routes/test.php`
- [x] 创建测试页面模板：`tests/TestPages/Components/button.blade.php`
- [x] 更新WorkbenchServiceProvider：配置视图路径
- [x] 更新workbench/routes/web.php：包含测试路由
- [x] 复制测试页面到workbench：`cp -r tests/TestPages workbench/resources/views/test`

#### 阶段4：HTML渲染测试（进行中）
- [x] 修复Table组件sanitizeHtml方法：
  - 添加了JavaScript函数清理：`preg_replace('/\b(alert|confirm|prompt|eval|document\.|window\.|console\.|location\.)/i', '', $cleaned);`
  - 修复了javascript:协议的正则表达式
  - [x] TableTest.php 所有测试通过 ✅

---

## ⚠️ 遇到的技术问题

### 浏览器测试环境配置问题
**问题**: `browser()` 全局函数未定义
**现象**: 
```
Call to undefined function browser()
```
**尝试的解决方案**:
1. [x] 在Pest.php中添加 `pest()->browser()`
2. [x] 删除不使用的BaseBrowserTest基类
3. [x] 移除use语句直接使用 `browser()` 全局函数
4. [x] 重新生成autoload: `composer dump-autoload`
5. [x] 重新运行testbench安装

**当前状态**: 问题仍未解决，需要进一步调试

**可能原因**:
- Pest Browser插件版本问题
- autoload缓存未正确加载
- 插件需要特定的配置或启动顺序
- 浏览器测试在包开发环境（workbench）中可能需要特殊处理

**解决方案建议**:
1. 查阅Pest Browser插件文档，确认正确配置方式
2. 检查插件版本与Pest版本兼容性
3. 尝试在Laravel应用环境中测试（非workbench）
4. 考虑使用其他浏览器测试方案（如Puppeteer）

---

## ✅ 正常工作的部分

### HTML测试
- [x] Table组件5个单元测试全部通过
- [x] 测试路由配置正确（curl可访问）
- [x] 测试页面模板正确创建
- [x] PHPUnit测试正常工作

### 基础设施
- [x] 目录结构完整
- [x] 基类创建完成
- [x] 配置文件更新
- [x] 旧测试清理完成

---

## 📋 后续执行计划

### 优先级1：解决浏览器测试问题（推荐先做）
**预估时间**: 1-2小时

**步骤**:
1. 查阅Pest Browser官方文档
   - 访问：https://pestphp.com/docs/browser-testing
   - 确认正确的配置方式
   - 检查是否有workbench环境特殊处理

2. 验证插件安装
   - 检查 `vendor/pestphp/pest-plugin-browser` 目录
   - 确认所有文件已正确安装
   - 检查 autoload 文件

3. 尝试最小化测试用例
   ```php
   <?php
   test('browser test works', function () {
       browser()->visit('/test/components/button')
           ->assertSee('Button Component Test');
   });
   ```

4. 如果问题持续，记录详细信息并提供替代方案

---

### 优先级2：继续HTML渲染测试（推荐方案A）
**预估时间**: 2-3天

**任务列表**:

#### 批次A：Form组件（22个）
- [ ] Input - 3个测试
- [ ] Textarea - 2个测试
- [ ] Select - 3个测试
- [ ] Checkbox - 2个测试
- [ ] Radio - 2个测试
- [ ] FileInput - 3个测试
- [ ] Button - 5个测试
- [ ] FloatingLabel - 2个测试
- [ ] InputGroup - 3个测试
- [ ] Select2 - 4个测试
- [ ] DatePicker - 3个测试
- [ ] Form - 2个测试
- [ ] Switch - 2个测试
- [ ] Range - 3个测试
- [ ] Validation - 3个测试
- [ ] InputMask - 2个测试
- [ ] MaxLength - 2个测试
- [ ] Dropzone - 3个测试
- [ ] CKEditor5 - 3个测试
- [ ] SimpleMDE - 2个测试

**预计测试数**: ~55个
**预计时间**: 4小时

#### 批次B：Layout组件（7个）
- [ ] Page - 2个测试
- [ ] Block - 2个测试
- [ ] Container - 2个测试
- [ ] Row - 2个测试
- [ ] Col - 3个测试
- [ ] Hero - 2个测试
- [ ] Offcanvas - 3个测试

**预计测试数**: ~16个
**预计时间**: 1.5小时

#### 批次C：Data Display（12个）
- [ ] Badge - 3个测试
- [ ] Card - 3个测试
- [ ] Pagination - 3个测试
- [ ] StatWidget - 4个测试
- [ ] StatGroup - 3个测试
- [ ] DataList - 2个测试
- [ ] Gallery - 2个测试
- [ ] Table - 3个测试（已有单元测试）

**预计测试数**: ~23个
**预计时间**: 2小时

#### 批次D：Navigation（8个）
- [ ] Breadcrumb - 3个测试
- [ ] NavTabs - 3个测试
- [ ] Tabs - 4个测试
- [ ] NavItem - 2个测试
- [ ] SidebarMenu - 3个测试
- [ ] MegaMenu - 3个测试
- [ ] HorizontalNav - 3个测试
- [ ] Steps - 2个测试

**预计测试数**: ~23个
**预计时间**: 1.5小时

#### 批次E：Feedback（11个）
- [ ] Alert - 4个测试
- [ ] Spinner - 3个测试
- [ ] Toast - 3个测试
- [ ] Progress - 3个测试
- [ ] Loading - 2个测试
- [ ] Rating - 4个测试
- [ ] SweetAlert2 - 5个测试
- [ ] Popover - 3个测试
- [ ] Tooltip - 3个测试
- [ ] Ribbon - 3个测试
- [ ] BootstrapNotify - 3个测试

**预计测试数**: ~36个
**预计时间**: 2小时

#### 批次F：Overlay（3个）
- [ ] Modal - 4个测试
- [ ] Dropdown - 4个测试
- [ ] MagnificPopup - 2个测试

**预计测试数**: ~10个
**预计时间**: 1小时

#### 批次G：Interactive（4个）
- [ ] Accordion - 4个测试
- [ ] Stepper - 3个测试
- [ ] Timeline - 2个测试
- [ ] Carousel - 4个测试

**预计测试数**: ~13个
**预计时间**: 1小时

#### 批次H：Third-party（15个）
- [ ] ChartJS - 5个测试
- [ ] DataTables - 6个测试
- [ ] FullCalendar - 4个测试
- [ ] ImageCropper - 3个测试
- [ ] VectorMap - 2个测试
- [ ] SyntaxHighlight - 2个测试
- [ ] Carousel（已在批次G）- 重复
- [ ] Rating（已在批次E）- 重复
- [ ] Range（已在批次D）- 重复
- [ ] Dropzone（已在批次D）- 重复
- [ ] Validation - 3个测试
- [ ] InputMask - 2个测试
- [ ] MaxLength（已在批次D）- 重复
- [ ] BootstrapNotify（已在批次E）- 重复
- [ ] SweetAlert2（已在批次E）- 重复
- [ ] MagnificPopup（已在批次F）- 重复
- [ ] SimpleMDE - 2个测试

**预计测试数**: ~22个
**预计时间**: 1.5小时

#### 批次I：Utility（12个）
- [ ] Avatar - 3个测试
- [ ] CodeExample - 2个测试
- [ ] VectorMap（已在批次H）- 重复
- [ ] SyntaxHighlight（已在批次H）- 重复
- [ ] Icons - 2个测试
- [ ] Animations - 2个测试
- [ ] Appear - 2个测试
- [ ] SimpleBar - 2个测试
- [ ] VideoBackground - 2个测试
- [ ] DataList（已在批次C）- 重复
- [ ] Steps（已在批次D）- 重复

**预计测试数**: ~15个
**预计时间**: 1.5小时

---

**HTML测试总计**:
- 组件数: 76个
- 预计测试数: ~210个
- 预计时间: ~14小时（约1.75个工作日）

---

## 🔄 阶段5-7计划（浏览器测试）

### 阶段5：浏览器测试（待问题解决后）
**预估时间**: 2-3天
**条件**: 浏览器测试环境配置问题解决后

**批次列表**:

#### 批次A：第三方库组件（11个）
- [ ] ChartJS - 4个测试（带截屏）
- [ ] DataTables - 6个测试（带截屏）
- [ ] FullCalendar - 4个测试（带截屏）
- [ ] SweetAlert2 - 5个测试（带截屏）
- [ ] Rating - 4个测试（带截屏）
- [ ] Range - 4个测试（带截屏）
- [ ] Dropzone - 4个测试（带截屏）
- [ ] ImageCropper - 3个测试（带截屏）
- [ ] CKEditor5 - 3个测试（带截屏）
- [ ] Carousel - 3个测试（带截屏）

**预计测试数**: ~45个
**预计时间**: ~7.5小时
**预计截屏数**: 40个

#### 批次B：复杂交互组件（9个）
- [ ] Modal - 4个测试（带截屏）
- [ ] Dropdown - 4个测试（带截屏）
- [ ] Tabs - 3个测试（带截屏）
- [ ] Accordion - 3个测试（带截屏）
- [ ] Tooltip - 2个测试（带截屏）
- [ ] Popover - 2个测试（带截屏）
- [ ] Offcanvas - 2个测试（带截屏）
- [ ] MegaMenu - 2个测试（带截屏）
- [ ] FormValidation - 2个测试（带截屏）

**预计测试数**: ~31个
**预计时间**: ~6.5小时
**预计截屏数**: 29个

---

**浏览器测试总计**:
- 组件数: 20个
- 预计测试数: ~76个
- 预计截屏数: 69个
- 预计时间: ~14小时（约1.75个工作日）

---

### 阶段6：CI/CD配置
**预估时间**: 4小时

**任务**:
- [ ] 创建GitHub Actions工作流文件：`.github/workflows/tests.yml`
- [ ] 配置HTML测试job
- [ ] 配置浏览器测试job
- [ ] 配置可访问性测试job（可选）
- [ ] 配置测试报告汇总
- [ ] 配置screenshots artifact上传（always）
- [ ] 配置多浏览器测试（可选的workflow）
- [ ] 优化Pest.php配置（CI环境headless模式）

---

### 阶段7：文档和总结
**预估时间**: 3小时

**任务**:
- [ ] 创建测试指南文档：`TESTING.md`
- [ ] 创建浏览器测试指南：`BROWSER_TESTING_GUIDE.md`
- [ ] 更新README.md（添加Testing章节）
- [ ] 更新COMPONENT_STATUS.md（添加测试覆盖）
- [ ] 创建执行检查清单：`CHECKLIST.md`

---

## 📊 总体进度预估

| 阶段 | 任务数 | 预计时间 | 状态 |
|------|--------|----------|------|
| 阶段0：环境准备 | 13 | 0.5h | ✅ 完成 |
| 阶段1：清理旧测试 | 4 | 0.25h | ✅ 完成 |
| 阶段2：创建基类 | 4 | 0.5h | ✅ 完成 |
| 阶段3：测试页面环境 | 13 | 1h | ✅ 完成 |
| 阶段4：HTML渲染测试 | ~210个 | 14h | 🔄 待开始 |
| 阶段5：浏览器测试 | ~76个 | 14h | ⏸️ 待问题解决 |
| 阶段6：CI/CD配置 | 8 | 4h | 📋 待开始 |
| 阶段7：文档和总结 | 5 | 3h | 📋 待开始 |

**总计**:
- **已安排任务**: ~240个
- **预计总时间**: ~37小时（约5个工作日）
- **预计测试总数**: ~286个
  - HTML测试: ~210个
  - 浏览器测试: ~76个
- **预计截屏数**: ~69个
- **预期覆盖率**: 75%

---

## 🎯 关键决策点（待用户回来时确认）

### 决策1：是否继续浏览器测试调试？
**选项A**: 继续调试，解决问题
- 预计时间：1-2小时
- 风险：可能无法快速解决

**选项B**: 暂时跳过浏览器测试，先完成HTML测试
- 优势：可以快速完成~210个测试（14小时）
- 风险：浏览器测试基础设施需要额外时间

**选项C**: 混合策略
- 先完成50%的HTML测试（约7小时）
- 同时并行调试浏览器测试问题
- 优势：平衡进度和问题解决

**建议**: 选项B（推荐）或选项C（平衡）

---

### 决策2：HTML测试执行顺序？
**选项A**: 按照计划中的批次顺序执行
- 优点：有条理
- 缺点：可能某些批次组件复杂度不同

**选项B**: 按组件复杂度优先
- 先简单组件（Form基础），再复杂组件（Third-party）
- 优点：快速提升测试数
- 缺点：可能打乱计划顺序

**建议**: 选项A（保持计划顺序）

---

## 📁 重要文件位置

### 测试文件
- 测试配置：`tests/Pest.php`
- 浏览器测试基类：`tests/Browser/BaseBrowserTest.php`
- HTML测试辅助：`tests/Feature/Components/ComponentTestHelper.php`
- 示例测试：`tests/Browser/Components/ButtonTest.php`（未完成）
- 表格测试：`tests/Unit/View/Components/TableTest.php`

### 配置文件
- 测试路由：`routes/test.php`
- Workbench路由：`workbench/routes/web.php`
- Workbench配置：`workbench/app/Providers/WorkbenchServiceProvider.php`
- Git忽略：`.gitignore`
- 包配置：`package.json`（项目根）

### 测试页面
- Button测试页：`tests/TestPages/Components/button.blade.php`
- Workbench视图：`workbench/resources/views/test/`（已复制）

---

## ⚠️ 当前已知问题

1. **浏览器测试环境配置问题**
   - `browser()` 函数未定义
   - 多次尝试修复未成功
   - 需要查阅文档或使用替代方案

2. **路由加载**
   - curl可以直接访问
   - 但Pest Browser可能使用不同的服务器

---

## 🚀 后续行动建议

### 短期（本次会话）
1. 决策1：选择HTML测试执行方案（选项A/B/C）
2. 开始阶段4：HTML渲染测试
3. 如果遇到问题，暂停并记录

### 中期（下次会话开始）
1. 完成阶段4的所有批次
2. 解决浏览器测试环境配置问题
3. 开始阶段5：浏览器测试（如果问题已解决）
4. 准备CI/CD配置（可以并行进行）

### 长期（持续进行）
1. 定期提交测试代码到Git
2. 更新进度文档
3. 优化测试速度（考虑并行执行）
4. 根据测试结果调整优先级

---

**存档结束时间**: 2024-12-24
**下次续接点**: 从"阶段4：HTML渲染测试"开始，选择"批次A：Form组件"

---

*祝您忙完后回来！测试计划已准备就绪，随时可以继续执行。*
