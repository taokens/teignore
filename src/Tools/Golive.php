<?php
namespace Taokens\Teignore\Tools;

class Golive
{
    const PRODUCT_GET_TENANT_INFO = '/api/open-api/product/get-tenant'; // 验证 JWT Token 、获取租户信息及菜单权限列表
    const PRODUCT_GET_BASE_DATA = '/api/open-api/product/base-data/get'; // 获取基础数据
    const PRODUCT_GET_DEPARTMENT = '/api/open-api/department/get-data'; // 获取租户组织架构
    const PRODUCT_GET_ALL_TENANT = '/api/open-api/data-platform/get-all-tenant'; // 获取所有租户Code与租户Code对应的名称
    const PRODUCT_GET_PRODUCT_AUTH = '/api/open-api/product/get-product-auth'; //获取租户产品是否需要身份认证

    const VIRTUAL_CODE = '/api/open-api/user-center/code/user-info'; // 根据一码通码值获取用户信息
    const USER_GET_DETAIL = '/api/open-api/user-center/user-info'; // 用户信息获取接口
    const USER_GET_IDENTITY = '/api/open-api/product/get-identity'; // 获取身份信息
    const USER_TOKEN_TO_CODE = '/api/open-api/user-center/user-code-by-token'; // Token换取user_code
    const USER_FACE_GET = '/api/open-api/user-center/user-face/info'; // 用户人脸信息获取接口
    const USER_DEP_GET = '/api/open-api/department/get-data-by-user'; // 获取用户组织架构
    const USER_GET_PHONE_DETAIL = '/api/open-api/user-center/phone/user-info'; // 根据手机号获取用户信息接口
    const DING_USER_GET_DETAIL = '/api/open-api/user-center/ding-user'; // 钉钉用户信息获取接口
    const USER_TENANT_AUTH_LIST = '/api/open-api/user-center/tenant/auth-user-info'; // 获取租户下人员信息（信息中心数据）
    const USER_TENANT_USER_LIST = '/api/open-api/user-center/tenant/user-info'; // 获取租户下的用户信息
    const USER_GENERATE = '/api/open-api/user-center/user-generate'; // 根据第三方传入数据生成用户

    const WECHAT_TOKEN = '/api/open-api/wechat/token'; // 获取微信token
    const WECHAT_JSSDK = '/api/open-api/wechat/js/sdk'; // 获取微信jsSdk

    const DATA_PERMISSION = '/api/open-api/product/data/permission'; // 根据租户账户-获取数据权限

    const DC_CREATE = '/api/open-api/dc/create'; // 创建下载任务
    const DC_PROGRESS = '/api/open-api/dc/progress'; // 更新下载任务进度
    const DC_CLOSE = '/api/open-api/dc/close'; // 下载结果通知

    const DING_TALK = '/api/open-api/ding-talk/code-info'; // 钉工牌付款码解析
}