
CREATE TABLE [dbo].[Members](
    [MemberID] [int] IDENTITY(1,1) NOT NULL,
    [FirstName] [varchar](50) NULL,
    [LastName] [varchar](50) NULL,
    [Email] [varchar](50) NULL,
    [Country] [varchar](50) NULL,
    [Created] [datetime] NULL
) ON [PRIMARY]
